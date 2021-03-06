<?php
$cityID = $_GET['cityID'];
$series1 = $_GET['series1'];
$series2 = $_GET['series2'];

/*
$sample_array['2016'] = "11,10,5,2,20,30,45";
$sample_array['2017'] = "11,15,11,12,2,3,5";
$sample_array['2018'] = "20,30,45,11,10,5,2";
*/

$city = getCity($cityID);

function getCity($value) {
	switch ($value) {
		case 0: 
			return 'QC';
			break;
		case 1: 
			return 'Tacloban';
			break;
		case 2: 
			return 'Iloilo';
			break;
		case 3: 
			return 'Cotabato';
			break;
		default: 
			return 'Aggregate';
			break;
	}
}

switch ($city) {
	case 'Aggregate':
		$sample_array['Cases'] = ["2984"
								,"7684"
								,"23058"
								,"35580"
								,"32650"
								,"50195"
								,"18757"
								,"3891"
								,"9157"
								,"9633"
								,"13019"
								,"11433"
								,"7088"
								,"10894"
								,"11112"
								,"39941"
								,"31609"
								,"34164"
								,"15842"
								,"28265"
								,"11391"
								,"9585"
								,"5457"
								,"7327"
								,"4473"
								,"5537"
								,"14828"
								,"17793"
								,"20896"
								,"20367"
								,"14173"
								,"20397"
								,"8758"
								,"6841"
								,"10443"
								,"6215"
								,"7321"
								,"10307"
								,"19203"
								,"58390"
								,"47408"];
		$sample_array["Model1"] = ["5806"
								,"5711"
								,"18102"
								,"43433"
								,"30470"
								,"59886"
								,"29955"
								,"13891"
								,"5129"
								,"8630"
								,"12898"
								,"13882"
								,"3515"
								,"12870"
								,"24612"
								,"24611"
								,"39939"
								,"19697"
								,"13527"
								,"21695"
								,"24642"
								,"10833"
								,"11579"
								,"8302"
								,"3116"
								,"8694"
								,"11665"
								,"28089"
								,"18276"
								,"13921"
								,"11010"
								,"19302"
								,"33513"
								,"4297"
								,"11310"
								,"9379"
								,"6672"
								,"9165"
								,"21675"
								,"42265"
								,"39634"
								,"52724"
								,"6090"
								,"51734"];
		$sample_array["Model2"] = ["5763"
								,"5787"
								,"18253"
								,"38158"
								,"28624"
								,"54314"
								,"19675"
								,"19889"
								,"6394"
								,"8171"
								,"13860"
								,"14692"
								,"3251"
								,"12882"
								,"24775"
								,"21772"
								,"41988"
								,"14618"
								,"20532"
								,"22654"
								,"25165"
								,"11403"
								,"11444"
								,"8294"
								,"3341"
								,"8741"
								,"11853"
								,"26502"
								,"18285"
								,"12707"
								,"11005"
								,"19356"
								,"33631"
								,"5347"
								,"11595"
								,"9781"
								,"6891"
								,"8556"
								,"22319"
								,"37652"
								,"40069"
								,"55625"
								,"3281"
								,"52149"];
		$sample_array["Model3"] = ["5703"
								,"5743"
								,"17965"
								,"43810"
								,"29768"
								,"63104"
								,"28530"
								,"15528"
								,"5302"
								,"8428"
								,"10159"
								,"14294"
								,"3648"
								,"12781"
								,"24665"
								,"25031"
								,"40691"
								,"20812"
								,"14831"
								,"22290"
								,"25486"
								,"11083"
								,"8303"
								,"8791"
								,"3164"
								,"8690"
								,"11702"
								,"28416"
								,"18291"
								,"15165"
								,"10810"
								,"19944"
								,"34982"
								,"4238"
								,"9303"
								,"9769"
								,"6683"
								,"9254"
								,"21819"
								,"42300"
								,"42645"
								,"55888"
								,"5074"
								,"52997"];
		break;
	case 'QC':
		$sample_array['Cases'] = ["308"
								,"621"
								,"3270"
								,"2368"
								,"5162"
								,"7923"
								,"2284"
								,"2855"
								,"841"
								,"638"
								,"811"
								,"1343"
								,"1384"
								,"689"
								,"1437"
								,"1323"
								,"2889"
								,"2701"
								,"1914"
								,"2361"
								,"1498"
								,"1088"
								,"699"
								,"910"
								,"511"
								,"861"
								,"2497"
								,"3180"
								,"5115"
								,"3306"
								,"3131"
								,"3101"
								,"1573"
								,"1149"
								,"2152"
								,"1026"
								,"759"
								,"658"
								,"3084"
								,"5213"
								,"3776"
								];
		$sample_array["Model1"] = ["748"
								,"408"
								,"2324"
								,"2482"
								,"4448"
								,"6591"
								,"7525"
								,"2708"
								,"2468"
								,"810"
								,"435"
								,"814"
								,"627"
								,"1960"
								,"2257"
								,"1042"
								,"2749"
								,"3256"
								,"2934"
								,"1842"
								,"2386"
								,"1731"
								,"1137"
								,"903"
								,"931"
								,"745"
								,"2784"
								,"1980"
								,"6411"
								,"6171"
								,"3119"
								,"3167"
								,"3574"
								,"1587"
								,"1454"
								,"2259"
								,"973"
								,"331"
								,"2670"
								,"2269"
								,"9090"
								,"4358"
								,"5185"
								,"3490"
								];
		$sample_array["Model2"] = ["772"
								,"409"
								,"2315"
								,"2575"
								,"4483"
								,"6325"
								,"7600"
								,"2638"
								,"2537"
								,"818"
								,"433"
								,"1102"
								,"669"
								,"1965"
								,"2261"
								,"1076"
								,"2731"
								,"3187"
								,"2884"
								,"1859"
								,"2385"
								,"1697"
								,"1129"
								,"1118"
								,"927"
								,"743"
								,"2791"
								,"2052"
								,"6406"
								,"5981"
								,"3149"
								,"3160"
								,"3504"
								,"1588"
								,"1407"
								,"3002"
								,"987"
								,"371"
								,"2632"
								,"2397"
								,"9031"
								,"4264"
								,"5239"
								,"3532"
								];
		$sample_array["Model3"] = ["903"
								,"403"
								,"2308"
								,"2995"
								,"4651"
								,"4879"
								,"8006"
								,"2270"
								,"2910"
								,"870"
								,"362"
								,"842"
								,"752"
								,"2002"
								,"2267"
								,"1194"
								,"2641"
								,"2811"
								,"2597"
								,"1951"
								,"2390"
								,"1532"
								,"1084"
								,"715"
								,"905"
								,"738"
								,"2794"
								,"2404"
								,"6398"
								,"4965"
								,"3309"
								,"3125"
								,"3151"
								,"1598"
								,"1168"
								,"2191"
								,"1065"
								,"440"
								,"2491"
								,"3057"
								,"8235"
								,"3778"
								,"5532"
								,"3756"
];
		break;	
	case 'Tacloban':
		$sample_array['Cases'] = ["26"
								,"162"
								,"290"
								,"110"
								,"129"
								,"443"
								,"295"
								,"84"
								,"189"
								,"276"
								,"391"
								,"612"
								,"197"
								,"202"
								,"864"
								,"749"
								,"379"
								,"1919"
								,"125"
								,"263"
								,"292"
								,"440"
								,"424"
								,"306"
								,"158"
								,"319"
								,"380"
								,"479"
								,"391"
								,"326"
								,"369"
								,"401"
								,"161"
								,"318"
								,"350"
								,"228"
								,"246"
								,"358"
								,"526"
								,"2032"
								,"1053"
								];
		$sample_array["Model1"] = [""
								,"98"
								,"369"
								,""
								,"136"
								,"416"
								,"430"
								,"357"
								,"90"
								,"301"
								,"310"
								,"564"
								,"64"
								,"543"
								,"504"
								,"661"
								,"498"
								,"1154"
								,"2393"
								,"199"
								,"285"
								,"272"
								,"729"
								,"496"
								,"172"
								,"433"
								,"793"
								,"324"
								,"284"
								,"1197"
								,"445"
								,"398"
								,"343"
								,"225"
								,"445"
								,"338"
								,"177"
								,"683"
								,"869"
								,"549"
								,""
								,"3741"
								,"498"
								,"1565"
								];
		$sample_array["Model2"] = [""
								,"99"
								,"366"
								,"2"
								,"129"
								,"421"
								,"176"
								,"356"
								,"95"
								,"314"
								,"321"
								,"569"
								,""
								,"539"
								,"512"
								,"676"
								,"525"
								,"1142"
								,"1311"
								,"206"
								,"306"
								,"265"
								,"774"
								,"500"
								,"154"
								,"434"
								,"785"
								,"327"
								,"298"
								,"1195"
								,"255"
								,"408"
								,"338"
								,"240"
								,"466"
								,"331"
								,"161"
								,"692"
								,"874"
								,"558"
								,""
								,"3781"
								,"293"
								,"1580"
								];
		$sample_array["Model3"] = ["6"
								,"96"
								,"382"
								,""
								,"215"
								,"395"
								,"352"
								,"358"
								,"67"
								,"236"
								,"259"
								,"526"
								,"430"
								,"566"
								,"468"
								,"618"
								,"760"
								,"1205"
								,"1923"
								,"160"
								,"192"
								,"303"
								,"506"
								,"471"
								,"265"
								,"431"
								,"824"
								,"318"
								,"468"
								,"1207"
								,"386"
								,"353"
								,"371"
								,"154"
								,"342"
								,"366"
								,"250"
								,"654"
								,"848"
								,"508"
								,"1684"
								,"3516"
								,"375"
								,"1532"
								];		
		break;	
	case 'Iloilo':
		$sample_array['Cases'] = ["214"
								,"351"
								,"2163"
								,"1200"
								,"1695"
								,"2119"
								,"1386"
								,"2245"
								,"460"
								,"505"
								,"863"
								,"1266"
								,"79"
								,"845"
								,"3445"
								,"6377"
								,"6154"
								,"4865"
								,"6081"
								,"2199"
								,"536"
								,"420"
								,"251"
								,"472"
								,"236"
								,"478"
								,"931"
								,"1744"
								,"1614"
								,"1751"
								,"534"
								,"1335"
								,"409"
								,"503"
								,"570"
								,"368"
								,"521"
								,"948"
								,"1761"
								,"4471"
								,"4310"
								];
		$sample_array["Model1"] = ["384"
								,"614"
								,"1577"
								,"976"
								,"1711"
								,"1351"
								,"1092"
								,"1160"
								,"1835"
								,"297"
								,"1095"
								,"1666"
								,""
								,"730"
								,"2648"
								,"5561"
								,"10444"
								,"7009"
								,"5365"
								,"6933"
								,""
								,"662"
								,"124"
								,"356"
								,"1385"
								,"529"
								,"907"
								,"2061"
								,"418"
								,"1920"
								,"2393"
								,"1678"
								,"5095"
								,"399"
								,"2813"
								,"171"
								,"329"
								,"2252"
								,"4235"
								,"5391"
								,""
								,""
								,"18726"
								,"7090"
								];
		$sample_array["Model2"] = ["313"
								,"619"
								,"1492"
								,"1275"
								,"1803"
								,"1359"
								,"935"
								,"1025"
								,"2059"
								,"609"
								,"1202"
								,"1442"
								,""
								,"735"
								,"2328"
								,"5184"
								,"10712"
								,"7083"
								,"5976"
								,"7528"
								,""
								,"1066"
								,"30"
								,"421"
								,"1318"
								,"504"
								,"894"
								,"2034"
								,"211"
								,"1893"
								,"1908"
								,"1644"
								,"4738"
								,"855"
								,"2894"
								,"106"
								,"239"
								,"2234"
								,"4204"
								,"5379"
								,""
								,""
								,"18618"
								,"6869"
								];
		$sample_array["Model3"] = ["302"
								,"650"
								,"1635"
								,"1007"
								,"1531"
								,"1454"
								,"1235"
								,"1049"
								,"1560"
								,"311"
								,"1140"
								,"1676"
								,""
								,"727"
								,"2614"
								,"5594"
								,"10677"
								,"7157"
								,"5382"
								,"7413"
								,""
								,"646"
								,"252"
								,"353"
								,"1171"
								,"518"
								,"968"
								,"2039"
								,"615"
								,"1783"
								,"2694"
								,"1750"
								,"5286"
								,"391"
								,"2779"
								,"145"
								,"182"
								,"2331"
								,"4338"
								,"5199"
								,""
								,""
								,"18875"
								,"7154"
								];				
		break;
	case 'Cotabato':
		$sample_array['Cases'] = ["91"
								,"207"
								,"259"
								,"65"
								,"77"
								,"127"
								,"58"
								,"1112"
								,"56"
								,"119"
								,"226"
								,"107"
								,"149"
								,"326"
								,"494"
								,"217"
								,"527"
								,"346"
								,"225"
								,"177"
								,"140"
								,"134"
								,"185"
								,"185"
								,"170"
								,"76"
								,"193"
								,"179"
								,"206"
								,"194"
								,"203"
								,"203"
								,"92"
								,"54"
								,"444"
								,"135"
								,"222"
								,"202"
								,"253"
								,"535"
								,"311"
								];
		$sample_array["Model1"] = [""
								,"211"
								,"456"
								,"171"
								,"13"
								,""
								,"114"
								,"870"
								,""
								,"65"
								,"289"
								,"583"
								,"119"
								,"356"
								,"462"
								,""
								,"113"
								,""
								,"552"
								,"1027"
								,"207"
								,"355"
								,"114"
								,"207"
								,"394"
								,"311"
								,"126"
								,"245"
								,"724"
								,"1005"
								,"301"
								,"282"
								,""
								,"1226"
								,"148"
								,""
								,"580"
								,"449"
								,""
								,"1939"
								,""
								,""
								,"945"
								,"1838"
								];
		$sample_array["Model2"] = ["111"
								,"213"
								,"412"
								,"146"
								,"13"
								,"14"
								,"30"
								,"846"
								,""
								,"27"
								,"222"
								,"357"
								,"137"
								,"361"
								,"422"
								,""
								,"175"
								,""
								,"586"
								,"1151"
								,"274"
								,"365"
								,"190"
								,"260"
								,"640"
								,"234"
								,"123"
								,"219"
								,"672"
								,"1023"
								,"229"
								,"253"
								,""
								,"1088"
								,"166"
								,""
								,"828"
								,"175"
								,""
								,"1781"
								,"16"
								,""
								,"608"
								,"1833"
								];
		$sample_array["Model3"] = ["278"
								,"131"
								,"284"
								,"230"
								,"51"
								,""
								,"95"
								,"779"
								,"575"
								,""
								,"331"
								,"76"
								,"116"
								,"466"
								,""
								,""
								,"153"
								,"242"
								,"700"
								,"1281"
								,"514"
								,"259"
								,""
								,"123"
								,"311"
								,"226"
								,"30"
								,"217"
								,"586"
								,"1072"
								,"29"
								,"373"
								,"665"
								,"585"
								,""
								,"25"
								,"387"
								,"72"
								,""
								,"1241"
								,"683"
								,""
								,"874"
								,"1488"
								];		
		break;
}

$result[] = $sample_array[$series1];
$result[] = $sample_array[$series2];

echo json_encode($result);