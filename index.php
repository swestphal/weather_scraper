<?php
session_start();
require_once("classes/session.php");
require_once("classes/city.php");

if (isset($_SESSION['language'])) {
    $file = $_SESSION['language'] . ".ini";
} else {
    $_SESSION['language'] = "de";
    $file = $_SESSION['language'] . ".ini";
}
$translation = parse_ini_file("assets/languages/" . $file);
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title> Weather Scraper </title>
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

        <div id="language" class="language">
            <span id="de" class="<?php if ($_SESSION['language'] == "de") echo "is-active"; ?>"> de</span>
            <span id="en" class="<?php if ($_SESSION['language'] == "en") echo "is-active"; ?>"> en</span>
        </div>
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

    
</script>



