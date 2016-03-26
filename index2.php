<?php
require_once("classes/session.php");
require_once("classes/city.php");
session_start();
//echo "hihiuhiuhiuh".(Session::get_language() != "en");

$session = new Session();
$location = $_GET['location'];
echo $_SESSION['language'];


$session::set_language("de");
echo ($_SESSION['language']);
$weather = City::find_weather($location);

$session::set_language("en");
echo ($_SESSION['language']);
echo "<br>";

echo "<message>".Session::check_message()."</message>";
echo "city_selected>".City::$city_name_selected."</city_selected>";
echo "<br>";

echo "city_selected>".City::$city_name_input."</city_selected>";
echo "<br>";

echo "city_selected>".City::$city_name_en."</city_selected>";
echo "<br>";

echo "city_selected>".City::$city_name_together."</city_selected>";
echo "<br>";

echo "city_selected>".City::$similar_cities."</city_selected>";
echo "<br>";
echo "<forecast_3days>".$weather[1][0]."</forecast_3days>";
echo "<forecast_3to6days>".$weather[1][1]."</forecast_3to6days>";
echo "<forecast_7to10days>".$weather[1][2]."</forecast_7to10days>";

?>