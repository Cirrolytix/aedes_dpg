# IMPORT LIBRARIES
import pandas as pd
import numpy as np
from dateutil.parser import parse 
import matplotlib as mpl
import matplotlib.pyplot as plt
import seaborn as sns
from scipy.interpolate import interp1d
from sklearn.metrics import mean_squared_error

#--- Import Statsmodels
from statsmodels.tsa.api import VAR
from statsmodels.tsa.stattools import adfuller
from statsmodels.tools.eval_measures import rmse, aic
from statsmodels.tsa.stattools import grangercausalitytests
from statsmodels.tsa.vector_ar.vecm import coint_johansen
from statsmodels.stats.stattools import durbin_watson
from statsmodels.tsa.stattools import acf

# IMPORT LIBRARIES
import itertools
import time
from math import sqrt

#--- Import Statsmodels
import statsmodels.api as sm

#--- Import Sklearn
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error
from sklearn.metrics import mean_absolute_error

#--- Importing tqdm for the progress bar
from tqdm import tnrange, tqdm_notebook

#--- Import sqlite3 dabase
import sqlite3

#Load the consolidated regions dataset and create database
df = pd.read_excel("../dataset/Consolidated_regions.xlsx")
def sql_connection():
    try:
        con = sqlite3.connect('aedes.db')
        return con
    except Error:
        print(Error)

def sql_table(con):
    cursorObj = con.cursor()
    cursorObj.execute("DROP TABLE IF EXISTS conso_regions;")
    con.commit()
    cursorObj = con.cursor()
    cursorObj.execute("""
        CREATE TABLE conso_regions(
            Date text, 
            MTD_Cases real, 
            MTD_Deaths real,
            Reg_Ave_Temp real,
            Reg_Ave_Rainfall real,
            GTrend_Dengue real,
            GTrend_Dengue_Sym real,
            GTrend_Dengue_Fever real,
            GTrend_Dengue_Cure real,
            GTrend_Dengue_Med real,
            Region text
            )""")
    con.commit()
con = sql_connection()
sql_table(con)

#create table and load dataset into SQLite DB
df.to_sql("conso_regions", con, if_exists="replace")

#get data and load it into a dataframe
raw_data = pd.read_sql_query("""
    SELECT strftime('%Y-%m-%d', Date, 'localtime') AS Date,
    MTD_Cases,
    MTD_Deaths,
    Reg_Ave_Temp,
    Reg_Ave_Rainfall,
    GTrend_Dengue,
    GTrend_Dengue_Sym,
    GTrend_Dengue_Fever,
    GTrend_Dengue_Cure,
    GTrend_Dengue_Med,
    Region
    FROM conso_regions""", con)

#Run support functions
def seasonal_mean(ts, n, lr=0.7):
    """
    TREAT THE MISSING VALUES USING SEASONAL MEAN
    Compute the mean of corresponding seasonal periods
    ts: 1D array-like of the time series
    n: Seasonal window length of the time series
    """
    out = np.copy(ts)
    for i, val in enumerate(ts):
        if np.isnan(val):
            ts_seas = ts[i-1::-n]  # previous seasons only
            if np.isnan(np.nanmean(ts_seas)):
                ts_seas = np.concatenate([ts[i-1::-n], ts[i::n]])  # previous and forward
            out[i] = np.nanmean(ts_seas) * lr
    return out

# CHECK FOR STATIONARITY OF THE TIME SERIES
def adfuller_test(series, signif=0.05, name='', verbose=False):
    """Perform ADFuller to test for Stationarity of given series and print report"""
    r = adfuller(series, autolag='AIC')
    output = {'test_statistic':round(r[0], 4), 'pvalue':round(r[1], 4), 'n_lags':round(r[2], 4), 'n_obs':r[3]}
    p_value = output['pvalue'] 
    def adjust(val, length= 6): return str(val).ljust(length)

    # Print Summary
    print(f'    Augmented Dickey-Fuller Test on "{name}"', "\n   ", '-'*47)
    print(f' Null Hypothesis: Data has unit root. Non-Stationary.')
    print(f' Significance Level    = {signif}')
    print(f' Test Statistic        = {output["test_statistic"]}')
    print(f' No. Lags Chosen       = {output["n_lags"]}')

    for key,val in r[4].items():
        print(f' Critical value {adjust(key)} = {round(val, 3)}')

    if p_value <= signif:
        print(f" => P-Value = {p_value}. Rejecting Null Hypothesis.")
        print(f" => Series is Stationary.")
    else:
        print(f" => P-Value = {p_value}. Weak evidence to reject the Null Hypothesis.")
        print(f" => Series is Non-Stationary.")   
        
def fit_linear_reg(X,Y):
    #Fit linear regression model 
    X2 = sm.add_constant(X)
    model_k = sm.OLS(Y,X2)
    fit = model_k.fit()
    pvalues = fit.pvalues
    worst_pval = pvalues.max() 
    worst_feature = pvalues.argmax()
    Y_Pred_Test = fit.predict(sm.add_constant(df_test[list(X)]))
    
    if worst_feature == 'const':
        model_k = sm.OLS(Y,X)
        fit = model_k.fit()
        pvalues = fit.pvalues
        worst_pval = pvalues.max() 
        worst_feature = pvalues.argmax()
        Y_Pred_Test = fit.predict(df_test[list(X)])
        
    pval = fit.pvalues.to_frame()
    features = list(pval.index)
    pvals = list(pval[0])
    sig = pval[pval[0]<=0.05]
    pct_sig = len(list(sig[0])) / len(list(pval[0]))
    rsq = fit.rsquared
    adjr = fit.rsquared_adj
    serial_corr = list(sm.stats.diagnostic.acorr_breusch_godfrey(fit, nlags=3))[3]
    het_arch = list(sm.stats.diagnostic.het_arch(fit.resid, maxlag=1))[3]
    normality = list(sm.stats.stattools.jarque_bera(fit.resid))[1]
    
    mae = mean_absolute_error(Y_True_Test,Y_Pred_Test)
    mse = mean_squared_error(Y_True_Test,Y_Pred_Test)
    rmse = sqrt(mean_squared_error(Y_True_Test,Y_Pred_Test))
    return features, pvals, pct_sig, rsq, adjr, serial_corr, het_arch, normality, mae, mse, rmse, worst_pval, worst_feature

#Get unique regions and run the algorithm per region
unique_regions = raw_data['Region'].unique()
for region in unique_regions:

    raw_data['Date'] = pd.to_datetime(raw_data['Date'], format='%Y-%m-%d')
    raw_data_region = raw_data[raw_data['Region'] == region].drop(['Region'], axis=1)

    # TRUNCATE DATA TO INCLUDE OBSERVATIONS UP TO 2018 ONLY
    raw_data_trunc = raw_data_region[raw_data_region['Date'] <= '2018-12-31']
    null_cols = raw_data_trunc.isnull().all()[raw_data_trunc.isnull().all() == True]
    raw_data_trunc = raw_data_trunc.drop(list(null_cols.keys()), axis=1)

    #--- Get the seasonal means
    raw_data_trunc['seas_mn_cases'] = seasonal_mean(raw_data_trunc.MTD_Cases, n=12, lr=1.25)
    raw_data_trunc['seas_mn_deaths'] = seasonal_mean(raw_data_trunc.MTD_Deaths, n=12, lr=1.25)

    #--- Replace the missing observations with the seasonal means
    raw_data_trunc.loc[raw_data_trunc['MTD_Cases'].isnull(),'MTD_Cases'] = raw_data_trunc['seas_mn_cases']
    raw_data_trunc.loc[raw_data_trunc['MTD_Deaths'].isnull(),'MTD_Deaths'] = raw_data_trunc['seas_mn_deaths']

    #--- Drop the seasonal mean columns
    raw_data_trunc = raw_data_trunc.drop(columns=['seas_mn_cases','seas_mn_deaths'])

    # CREATE A NEW COLUMN FOR MORTALITY RATE
    raw_data_trunc['Mort_Rate'] = raw_data_trunc.MTD_Deaths / raw_data_trunc.MTD_Cases

    # TRANSFORM GOOGLE TREND COLUMNS TO PERCENTAGES
    gtrend_cols = [col for col in raw_data_trunc if col.startswith('GTrend')]
    raw_data_trunc[gtrend_cols]= raw_data_trunc[gtrend_cols].apply(lambda t: t / 100)
    raw_data_trunc[gtrend_cols]
    raw_data_trunc = raw_data_trunc.set_index('Date')

    # ADF Test on each column
    #     for name, column in raw_data_trunc.iteritems():
    #         adfuller_test(column, name=column.name)

    # SINCE NOT ALL OF THE SERIES ARE STATIONARY, PERFORM DIFFERENCING.  USE PERCENTAGE DIFFERENCING FOR THE 
    # SERIES CASES, TEMPERATURE, AND RAINFALL.  USE SIMPLE DIFFERENCING FOR THE SERIES MORTALITY AND GOOGLE TRENDS

    #--- Calculate the first differences
    raw_data_diff = raw_data_trunc.diff().dropna()
    raw_data_diff = raw_data_diff.drop(columns=['MTD_Cases','Reg_Ave_Temp','Reg_Ave_Rainfall'])

    #--- Calculate the percentage differences for MTD_Cases, Reg_Ave_Temp_ARMM, and Reg_Ave_Rainfall_ARMM
    raw_data_diff[['MTD_Cases','Reg_Ave_Temp','Reg_Ave_Rainfall']] = raw_data_trunc.groupby(raw_data_trunc.index)['MTD_Cases','Reg_Ave_Temp','Reg_Ave_Rainfall'].pct_change().dropna()

    for row in raw_data_diff.columns:
        if row == 'MTD_Deaths' or row == 'MTD_Cases' or row == 'Mort_Rate':
            continue
        else:
            col_name_L1 = row + '_L1'
            col_name_L2 = row + '_L2'
            col_name_L3 = row + '_L3'
            raw_data_diff[col_name_L1] = raw_data_diff[row].shift(1)
            raw_data_diff[col_name_L2] = raw_data_diff[row].shift(2)
            raw_data_diff[col_name_L3] = raw_data_diff[row].shift(3)

    Dummies = pd.get_dummies(raw_data_diff.index.month, prefix='m')
    raw_data_diff = raw_data_diff.reset_index()
    raw_data_diff = raw_data_diff.merge(Dummies, left_index=True, right_index=True)
    raw_data_diff.set_index('Date', inplace=True)

    # SPLIT SERIES TO TRAINING AND TEST SETS
    #--- Set 2018 as the test dataframe
    nobs = 12
    df_train, df_test = raw_data_diff[0:-nobs], raw_data_diff[-nobs:]
    df_train = df_train.dropna()
    df_test = df_test.dropna()

    try:
        # INITIALIZE VARIABLES
        X = df_train[df_train.columns[df_train.columns.str.contains(r'_L|m_')]]
        Y = df_train.MTD_Cases
        Y_True_Test = df_test.MTD_Cases
        threshold_out = 0.05

        remaining_features = list(X.columns.values)
        features = []
        R_squared_list, AdjR2_list, feature_list, pval_list = [],[],[],[]
        pct_sig_list = []
        num_features = []
        serial_corr_list = []
        het_arch_list = []
        norm_list = []
        mae_list, mse_list, rmse_list = [],[],[]

        # RUN BACKWARD STEPWISE REGRESSION 
        #--- Remove predictors one at a time until there is no more p-value exceeding the threshold
        while True:
            changed = False
            tmp_result = fit_linear_reg(X[list(set(remaining_features))],Y)  
            num_features.append(len(remaining_features)) 
            feature_list.append(tmp_result[0])
            pval_list.append(tmp_result[1])
            pct_sig_list.append(tmp_result[2])
            R_squared_list.append(tmp_result[3])
            AdjR2_list.append(tmp_result[4])
            serial_corr_list.append(tmp_result[5])
            het_arch_list.append(tmp_result[6])
            norm_list.append(tmp_result[7])
            mae_list.append(tmp_result[8])
            mse_list.append(tmp_result[9])
            rmse_list.append(tmp_result[10])

            if tmp_result[11] > threshold_out:
                changed = True
                remaining_features.remove(tmp_result[12])

            if not changed:
                break
    except:
        # PERFORM UNIVARIATE REGRESSION TO TRIM DOWN THE PREDICTORS
        predictor_col = df_train.columns[df_train.columns.str.contains(pat = '_L')]
        pvals = pd.DataFrame()
        for col in predictor_col:
            Y = df_train.MTD_Cases
            X = df_train[col]
            X2 = sm.add_constant(X)
            mod = sm.OLS(Y,X)
            fit = mod.fit()
            pval = fit.summary2().tables[1]['P>|t|']
            pval = pval.to_frame()
            pvals = pvals.append(pval)

        # RETAIN ONLY THE LAGGED PREDICTORS WITH SIGNIFICANT P-VALUES
        pvals = pvals[pvals['P>|t|'] <= 0.05].reset_index()
        pvals = pvals.rename(columns={'index':'Variable'})
        shortlist_predictor_col = pvals['Variable']
        dummy = pd.Series(df_train.columns[df_train.columns.str.startswith('m_')])
        shortlist_predictor_col = shortlist_predictor_col.append(dummy)
        X = df_train[shortlist_predictor_col].drop(columns=['m_1'],axis=1)
        #X = df_train[shortlist_predictor_col]
        list(X)

        Y = df_train.MTD_Cases
        Y_True_Test = df_test.MTD_Cases
        threshold_out = 0.05

        remaining_features = list(X.columns.values)
        features = []
        R_squared_list, AdjR2_list, feature_list, pval_list = [],[],[],[]
        pct_sig_list = []
        num_features = []
        serial_corr_list = []
        het_arch_list = []
        norm_list = []
        mae_list, mse_list, rmse_list = [],[],[]

        # RUN BACKWARD STEPWISE REGRESSION 
        #--- Remove predictors one at a time until there is no more p-value exceeding the threshold
        while True:
            changed = False
            tmp_result = fit_linear_reg(X[list(set(remaining_features))],Y)  
            num_features.append(len(remaining_features)) 
            feature_list.append(tmp_result[0])
            pval_list.append(tmp_result[1])
            pct_sig_list.append(tmp_result[2])
            R_squared_list.append(tmp_result[3])
            AdjR2_list.append(tmp_result[4])
            serial_corr_list.append(tmp_result[5])
            het_arch_list.append(tmp_result[6])
            norm_list.append(tmp_result[7])
            mae_list.append(tmp_result[8])
            mse_list.append(tmp_result[9])
            rmse_list.append(tmp_result[10])

            if tmp_result[11] > threshold_out:
                changed = True
                remaining_features.remove(tmp_result[12])

            if not changed:
                break

    # STORE IN DATAFRAME
    subsets_df = pd.DataFrame({'num_features': num_features, 'features': feature_list, 'P>|t|': pval_list, 'pct_sig': pct_sig_list, \
                              'rsq': R_squared_list, 'adj_rsq': AdjR2_list, 'serial_corr': serial_corr_list, 'het': het_arch_list, \
                              'normality': norm_list, 'mae': mae_list, 'mse': mse_list, 'rmse': rmse_list})

    # RETAIN ONLY THE SUBSET MODELS WHICH PASSED THE DIAGNOSTIC TESTS
    subsets_df = subsets_df[(subsets_df['serial_corr'] > 0.05) & (subsets_df['het'] > 0.05) & (subsets_df['normality'] > 0.05)]

    # GET ONLY THE TOP 3 MODELS BY ADJUSTED R-SQUARED
    top3_subsets_df = subsets_df.nlargest(3,'adj_rsq').reset_index().drop(columns=['index'])
    top3_subsets_df.index += 1

    # RERUN THE TOP 3 MODELS AND STORE THE FORECASTS FOR BOTH TRAINING AND TEST SETS
    Y = df_train['MTD_Cases']

    for i in range(1,4):
        top = top3_subsets_df['features'][i]
        if top.count('const') == 0:
            X = df_train[top]    
            reg = LinearRegression(fit_intercept=False)

        if top.count('const') > 0:
            top.remove('const')
            X = df_train[top]    
            reg = LinearRegression(fit_intercept=True)

        reg.fit(X,Y)
        prediction = pd.DataFrame(reg.predict(X))
        prediction.columns = ['Pred_Model_'] 
        prediction.columns += str(i)
        if i == 1:
            df_train2 = df_train.reset_index().join(prediction, how='inner')
        if i > 1:
            df_train2 = df_train2.reset_index().join(prediction, how='inner')

        prediction = pd.DataFrame(reg.predict(df_test[X.columns]))
        prediction.columns = ['Pred_Model_']
        prediction.columns += str(i)
        if i == 1:
            df_test2 = df_test.reset_index().join(prediction, how='inner')
        if i > 1:
            df_test2 = df_test2.reset_index().join(prediction, how='inner')

    # REVERT THE FORECAST TO THE ORIGINAL FORM FROM PERCENTAGE CHANGE
    raw_data_fct = df_train2.append(df_test2, ignore_index=True)
    raw_data_fct = raw_data_fct[['Date','Pred_Model_1','Pred_Model_2','Pred_Model_3']]
    raw_data_fct['Pred_Model_1'] += 1
    raw_data_fct['Pred_Model_2'] += 1
    raw_data_fct['Pred_Model_3'] += 1
    raw_data_fct = raw_data_fct.rename(columns={'Pred_Model_1': 'Pred_PctChg_1', 'Pred_Model_2': 'Pred_PctChg_2', \
                    'Pred_Model_3': 'Pred_PctChg_3'})
    raw_data_fct.set_index('Date', inplace=True)

    # MERGE THE FORECASTED DATA INTO THE MAIN DATASET
    raw_data_merge = raw_data_trunc.merge(raw_data_fct,how='left',on='Date')
    raw_data_merge['MTD_Cases_Fct_1'] = raw_data_merge.MTD_Cases.shift(1) * raw_data_merge['Pred_PctChg_1']
    raw_data_merge['MTD_Cases_Fct_2'] = raw_data_merge.MTD_Cases.shift(1) * raw_data_merge['Pred_PctChg_2']
    raw_data_merge['MTD_Cases_Fct_3'] = raw_data_merge.MTD_Cases.shift(1) * raw_data_merge['Pred_PctChg_3']
    raw_data_merge = raw_data_merge.drop(columns=['Pred_PctChg_1','Pred_PctChg_2','Pred_PctChg_3'])
    
    #CREATE TABLE USING THE NAME OF THE REGION
    tbl_name = region.lower().replace(" ", "_") + "_fct"

    # GET DATA
    try:
        raw_data_merge.to_sql(tbl_name, con, if_exists="replace")
        print("Forecasted results were successfully inserted into " + tbl_name + " table")
    except:
        print("Error during insertion.")