<?php
require_once("classes/session.php");
require_once("classes/city.php");
$session = new Session();


if (isset($_POST['submit']) && (($_POST['ort']))) {

    $city = $_POST['ort'];


}
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Weather Scraper</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="assets/css/styles.css" rel="stylesheet" media="all">
</head>

<div class="row">
    <div class="col-md-8 col-md-offset-2 heading">
        <h1 class="text-center white">Dein persönliches Wetter</h1>
        <p class="lead text-center heading">
            Bitte gebe Deine Stadt ein, um das Wetter vor Ort zu ermitteln
        </p>
    </div>
</div>


<?php

include_once("templates/city_input.php");


if (isset($city)) {
    include_once("templates/show_forecast.php");
}; ?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>

<!--js-->

<!--<script>-->
<!---->
<!--    $('#submit_city').click(function () {-->
<!--        $.get("scraping.php?city=London", function (data) {-->
<!--            alert(data);-->
<!--        });-->
<!--    });-->
<!---->
<!---->
<!--</script>-->

</body>
</html>
