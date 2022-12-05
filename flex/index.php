<!DOCTYPE HTML>
<html>
<head>
	<title>Fighting Dengue</title>
	<link rel="stylesheet" href="resources/css/all.css"/>
	<link rel="stylesheet" href="resources/app_css.css"/>
	<link rel="stylesheet" href="resources/w3.css"/>
	<link rel="shortcut icon" href="icon.png" type="image/x-icon"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Project AEDES" />
    <meta name="description" content="AEDES aims to improve public health response against dengue in the Philippines by predicting dengue cases from climate and digital data and pinpointing possible hotspots from satellite data." />
    <meta name="keywords" content="philippines, satellite data, dengue, google searches, climate, fapar, ndwi, dominic ligot, claire tayco, mark toledo, jansen lopez" />
    <meta property="og:url" content="http://aedesproject.org" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Project AEDES" />
    <meta property="og:description" content="AEDES aims to improve public health response against dengue in the Philippines by predicting dengue cases from climate and digital data and pinpointing possible hotspots from satellite data." />
    <meta property="og:image" content="resources/images/slide1.png" />
    <meta name="twitter:image" content="resources/images/slide1.png" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126660213-5"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-126660213-5');
	</script>
</head>

<style>
.w3-theme {
color:#fff !important;background-color:#34558b !important}
</style>

<body class="roboto" onresize="toggleClose('navBar');">
	<script type="text/javascript" src="forecast/chart.bundle.js"></script>

	<header class="w3-top">
		<div class="w3-container w3-theme w3-xlarge w3-bar">
			<div class="w3-bar-item w3-button w3-hide-large" onclick="toggle('navBar');"><i class="w3-xxlarge fa fa-bars"></i></div>
			<div class="w3-bar-item"><img src="resources/images/TF_logo.png" height="45" /></a></div>
		</div>
	</header>

	<div class="spacer"></div>

	<nav class="quattrocento">
		<div class="w3-sidebar w3-container w3-theme w3-col l2 w3-bar-block w3-hide-medium w3-hide-small">
			<? include('menu.php'); ?>
		</div>

		<div id="navBar" class="w3-sidebar w3-container w3-theme w3-animate-left w3-bar-block w3-hide w3-large">
			<? include('menu.php'); ?>
		</div>
	</nav>

	<div class="w3-row">
		<div class="w3-col l2 w3-hide-medium w3-hide-small">&nbsp;</div>
		<div class="w3-col w3-white l10">
			<span id="snapshot" ><br/></span><hr/>
			<section class="w3-padding">
				<div class="w3-xlarge" >Dengue Snapshot</div>
				<p> To view dengue data reports and climate data in CALABARZON for the year 2018, select desired month below. </p>
				<? include ('dashboard/index.html'); ?>
				<p class="w3-small">Source: Deparment of Health Reports, DOST-PAGASA Climate Readings</p>
				<p class="w3-small">Please allow time to load data. See <a class="w3-text-indigo" href="#about">below</a> for references.</p>
			</section>

			<span id="section1" ><br/></span><hr/>
			<section class="w3-padding">
				<div class="w3-xlarge" >Predicted Mosquito Hotspots</div>
				<p> Cities with highest reported cases of dengue in 2019 were selected for geospatial mapping of hotspot locations. User can select desired city in CALABARZON region and view identified potential breeding locations of mosquitoes. </p>
				<br/><? include ('maps/index.html'); ?>
				<p class="w3-small">Source: Sentinel-2 Copernicus, Landsat</p>
				<p class="w3-small">Please allow time to load data. Pins represent intersection of NDWI, NDVI, FAPAR readings. See <a class="w3-text-indigo" href="#about">below</a> for references.</p>
			</section>


			<span id="section3" ><br/></span><hr/>
			<section class="w3-padding">
				<div class="w3-xlarge">Dengue Forecast</div>
				<p> Using Time-Series models, dengue cases and deaths can be predicted and forecasted up to 4 months. User can visualize the forecast of CALABARZON cases and deaths from July 2018 to November 2018. </p>
				<br/><? include ('forecast/index.html'); ?>
				<p class="w3-small">Source: Deparment of Health Reports, Climate DOST-PAGASA, Google Searches</p>
				<p class="w3-small">Please allow time to load data. Models represent top fitted forecasts for period 2015-2018. Model predictors tested: average rainfall, average temperature, google searches (dengue, dengue fever, dengue symptoms, dengue medicine), monthly seasonality, lagged effects. Please <a class="w3-text-indigo" href="#contact">contact us</a> for model definitions. </p>
			</section>

			<span id="about" ><br/></span><hr/>
			<section class="w3-padding">
				<div class="w3-xlarge" >Fighting Dengue with Data</div>
				<p> Team Flex aims to address delayed reporting of dengue surveillance data in the CALABARZON region of the Philippines through prediction of the spread of dengue and visualization of potential dengue hotspot locations. </p>

				<p>Original concept based from <b>Project AEDES (Advanced Early Dengue Prediction and Exploration Service):</b> </p>
				<p>The service relies on 3 data sets:
				<ul><li>Global Data: Satellite imaging data from <a class="w3-text-indigo" href="https://sentinel.esa.int/web/sentinel/sentinel-data-access">Sentinel-2 Copernicus</a> and <a class="w3-text-indigo" href="https://www.usgs.gov/land-resources/nli/landsat/landsat-8">Landsat</a></li>
				<li>Local Data: Climate data from <a class="w3-text-indigo" href="http://bagong.pagasa.dost.gov.ph/climate/climatological-normals">DOST-PAGASA</a></li>
				<li>Digital Data: <a class="w3-text-indigo" href="https://trends.google.com/trends/explore?date=today%205-y&geo=PH&q=dengue">Google search trends for 'dengue'</a> and related terms</li></ul></p>

				<p>We propose to forecast dengue cases using a combination of:
				<ul><li>Climate Data: Average monthly temperature readings from local weather stations</li>
				<li>Climate Data: Average monthly rainfall (precipitation) readings from local weather stations</li>
				<li>Google Data: Search index for 'dengue', 'dengue symptoms', 'dengue fever', and 'dengue medicine'</li>
				<li>Lagged values for Climate factors, Google data, and actual dengue cases</li></ul></p>

				<p>We propose to detect likely mosquito hotspots using Satellite data readings:
				<ul><li>FAPAR: Fraction of Absorbed Photosynthetically Active Radiation, reference <a class="w3-text-indigo" href="https://pdfs.semanticscholar.org/d178/bd58b51fd18c2b97b07aa5c6154d49562a87.pdf">here</a>.</li>
				<li>NDWI: Normalized Difference Water Index, reference <a class="w3-text-indigo" href="http://ceeserver.cee.cornell.edu/wdp2/cee6150/Readings/Gao_1996_RSE_58_257-266_NDWI.pdf">here</a>.</li></ul></p>
			</section>

			<span id="contact" ><br/></span><hr/>
			<section class="w3-padding">
				<div class="w3-xlarge" >Contact Us</div>
				<p> Team Flex was founded by three scholars currently taking up the Data Science Program of FTW Foundation.
				<div><img src="images.jpg" height="250" /></a></div>&nbsp;  &nbsp; &nbsp;
				<a class="w3-text-indigo" href="https://www.linkedin.com/in/rachemelendres/">Rache Melendres</a>, Data Science Scholar  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
				<a class="w3-text-indigo" href="https://www.linkedin.com/in/janinepadilla/">Janine Padilla</a>, Data Science Scholar &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
				<a class="w3-text-indigo" href="http://twitter.com/economox">Mox Ballo</a>, Data Science Scholar



				<p> &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  We are open to collaborations and suggestions. Feel free to connect with us via our Linkedin. Just click our name! <a class="w3-text-indigo"></a>.</p>
			</section>
			<footer class="w3-padding w3-small w3-black">
				&copy;
				 Team Flex Dengue Project , 2020
				(Adapted from Project AEDES)
			</footer>
		</div>
	</div>

	<script src="resources/app_js.js"></script>

</body>
</html>