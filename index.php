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
    <link rel="stylesheet" href="assets/fonts/linecons/style.css">
    <link rel="stylesheet" href="assets/css/foundation.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css"/>
    <link rel="stylesheet" href="assets/css/core.css"/>
    <link href="assets/css/styles.css" rel="stylesheet" media="all">
    <link href='https://fonts.googleapis.com/css?family=Orbitron:400,500,700,900|Quantico:400,700' rel='stylesheet'
          type='text/css'>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<body>
<div id="container">
    <div class="container">

        <?php
        include("templates/welcome_message.php");

        include("templates/city_input.php");

        ?>
        <div id="preloader"></div>

        <?php

        include("templates/weather_output.php");

        ?>

    </div>
</div>
</body>
</html>
<script src="assets/js/vendor/what-input.min.js"></script>
<script src="assets/js/foundation.min.js"></script>
<script src="assets/js/app.js"></script>
<script>

    $("input#location").click(function(){
         $(".container-output").fadeOut(2000);
    });

    $('#findweather').click(function (event) {
        $('input#location').attr("placeholder", ".. Daten werden gesucht").val("").focus().blur();
        showWeather();
        event.preventDefault();
    });

    $(document).ready(function () {
        $('#container').css("visibility","visible").fadeIn('slow');
        $('.container-welcome').css("padding-top", "25%");
        setTimeout(function() { $('.container-input').css('opacity',"1");},1000);
    });


    function showWeather() {
        if ((document.getElementById("location")).length == 0) {

            //todo if error ......
            document.getElementById("message").innerHTML = "nix";

            return;
        }
        var xmlhttp = new XMLHttpRequest();

//        document.getElementById("preloader").innerHTML ="<img src='assets/images/316.gif'>";
        xmlhttp.onreadystatechange = function () {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("city_selected").innerHTML = xmlhttp.responseXML.getElementsByTagName("city_selected")[0].innerHTML;
                document.getElementById("forecast_3days").innerHTML = xmlhttp.responseXML.getElementsByTagName("forecast_3days")[0].innerHTML;
                document.getElementById("forecast_3to6days").innerHTML = xmlhttp.responseXML.getElementsByTagName("forecast_3to6days")[0].innerHTML;
                document.getElementById("forecast_7to10days").innerHTML = xmlhttp.responseXML.getElementsByTagName("forecast_7to10days")[0].innerHTML;
                document.getElementById("preloader").innerHTML = "";
                $(".container-output").fadeIn('slow');
                $("input#location").attr("placeholder", "Bitte einen Ort eingeben..").val("").focus().blur();

            }

        };

        xmlhttp.open("POST", "http://devweatherscraper/scraping.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("location=" + document.getElementById('location').value);


    }


    $(".container-output").hide();

    $(document).foundation();
</script>



