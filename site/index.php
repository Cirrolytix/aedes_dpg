<?php

if (!$_GET) {
	$page = '';
} else {
	$page = $_GET['page'];
}

function selected_page($page) {
	switch ($page) {
		case 'technical':
			return 'technical.html';
			break;
		default:
			return 'dashboard.html';
			break;
	}	
}

function open($filename) {
	$result = '';
	$file = fopen($filename, "r");
	while (!feof($file)) {
		$result .= (fgets($file));
	}
	return $result;
	fclose($file);
}

$head = open('head.html');
$menu = open('menu.html');
$main = open(selected_page($page));
$foot = open('foot.html');
$body = $head . $menu . $main . $foot;
echo $body; 
