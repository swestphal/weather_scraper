<?php

if (isset($_POST['submit'])) {
$ort=str_replace(' ','-',$_POST['ort']);

    $url = "http://www.weather-forecast.com/locations/{$ort}/forecasts/latest";
    $weather_content = file_get_contents($url);

    preg_match('/class="phrase">(.*?)<\/span><\/span><\/span><\/p>/s', $weather_content, $matches);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Scraper</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="assets/css/styles.css" rel="stylesheet" media="all">
</head>
<body>
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2 heading">
            <h1 class="text-center white">Dein persönliches Wetter</h1>
            <p class="lead text-center heading">Bitte gebe Deine Stadt ein, um das Wetter vor Ort zu ermitteln</p>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <input class="form-control" type="text" id="ort" name="ort" placeholder="z.B. München">
                    <input class="form-control" type="submit" name="submit">
                </div>
            </form>
            <p><?php echo isset($matches) ? $matches[1] : "";; ?></p>
        </div>
    </div>
</div>
</body>
</html>