<?php
header("Content-type: text/xml");
header('Cache-Control: no-cache');
header('Pragma: no-cache');

//
require_once("classes/session.php");
require_once("classes/city.php");
$session = new Session();
$location = $_POST['location'];
//
$weather = City::find_weather($location);

echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<xmlresponse>";
echo "<result>";
echo "<message>".Session::check_message()."</message>";
echo "<city_selected>".City::$city_name_selected."</city_selected>";
echo "<forecast_3days>".$weather[1][0]."</forecast_3days>";
echo "<forecast_3to6days>".$weather[1][1]."</forecast_3to6days>";
echo "<forecast_7to10days>".$weather[1][2]."</forecast_7to10days>";
echo"</result>";
echo "</xmlresponse>";