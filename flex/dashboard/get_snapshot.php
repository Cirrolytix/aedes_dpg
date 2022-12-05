<?php

$snapshot = $_GET['snapshot'];

// data : dengue Ncr (searches) ,  MOnth to date case, month to date death, ave temp, rainfall, forecast cases
$data_array['Jan-18'] = ["1,328", "13", "26.8", "90.2"]; 
$data_array['Feb-18'] = ["1,529", "4", "27.35", "46.65"]; 
$data_array['Mar-18'] = ["782", "10", "29.50", "25.63"]; 
$data_array['Apr-18'] = ["764", "1", "30.6", "77.35"]; 
$data_array['May-18'] = ["784", "4", "28.45", "470.02" ]; 
$data_array['Jun-18'] = ["1,669", "12", "27.72","522.02" ]; 
$result = '';

if ($snapshot) {
	$result .= '<div class="w3-col l4 m6 w3-padding-small"><div class="w3-card w3-white w3-padding w3-padding-16"><i class="fas fa-users" style="margin-right: 10px;"></i>Month-to-date Cases<span class="w3-right">'.$data_array[$snapshot][0].' patients</span></div></div>';
	$result .= '<div class="w3-col l4 m6 w3-padding-small"><div class="w3-card w3-white w3-padding w3-padding-16"><i class="fas fa-cross" style="margin-right: 10px;"></i>Month-to-date Deaths<span class="w3-right">'.$data_array[$snapshot][1].' patients</span></div></div>';
	$result .= '<div class="w3-col l4 m6 w3-padding-small"><div class="w3-card w3-white w3-padding w3-padding-16"><i class="fas fa-thermometer-half" style="margin-right: 10px;"></i>Average Temperature<span class="w3-right">'.$data_array[$snapshot][2].'C</span></div></div>';
	$result .= '<div class="w3-col l4 m6 w3-padding-small"><div class="w3-card w3-white w3-padding w3-padding-16"><i class="fas fa-cloud-rain" style="margin-right: 10px;"></i>Average Rainfall<span class="w3-right">'.$data_array[$snapshot][3].'mm</span></div></div>';
}
echo $result;