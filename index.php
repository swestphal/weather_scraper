<?php
require_once("classes/session.php");
require_once("classes/city.php");
$session = new Session();


if (isset($_POST['submit']) && (($_POST['ort']))) {


    $input = $_POST['ort'];


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
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<body>

<div class="container">

    <?php
    include("templates/welcome_message.php");

    include("templates/city_input.php");


    if (isset($input)) {
        City::find_weather($input);
        include("templates/weather_output.php");
    }; ?>

</div>
</body>
</html>
