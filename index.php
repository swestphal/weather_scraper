<?php
require_once("classes/session.php");
require_once("classes/city.php");


//if (isset($_POST['submit']) && (($_POST['ort']))) {
//
//
//    $input = $_POST['ort'];
//
//
//}
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Weather Scraper</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="assets/css/styles.css" rel="stylesheet" media="all">
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<body>

<div class="container">

    <?php
    include("templates/welcome_message.php");

    include("templates/city_input.php");


    //    if (isset($_POST['city']) {
    //        City::find_weather($input);
    include("templates/weather_output.php");
    //    };
    ?>
    <div id="txtHint"></div>
</div>
</body>
</html>

<script>

    function showWeather() {
        if ((document.getElementById("location")).length == 0) {

        //todo if error ......
            document.getElementById("message").innerHTML = "nix";

            return;
        }
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("forecast_3days").innerHTML = (xmlhttp.responseXML.getElementsByTagName("forecast_3days")[0]).innerHTML;
                document.getElementById("forecast_3to6days").innerHTML = xmlhttp.responseXML.getElementsByTagName("forecast_3to6days")[0].innerHTML;
                document.getElementById("forecast_7to10days").innerHTML = xmlhttp.responseXML.getElementsByTagName("forecast_7to10days")[0].innerHTML;
            }

        };

        xmlhttp.open("GET", "http://devweatherscraper/scraping.php?location="+document.getElementById('location').value, true);
        xmlhttp.setRequestHeader("Content-type","text/xml");
        xmlhttp.send();


    }
</script>

