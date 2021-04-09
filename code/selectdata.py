import pandas as pd
#--- Import sqlite3 dabase
import sqlite3

def sql_connection():
    try:
        con = sqlite3.connect('aedes.db')
        return con
    except Error:
        print(Error)
con = sql_connection()

print(pd.read_sql_query("SELECT * FROM western_visayas_fct", con))