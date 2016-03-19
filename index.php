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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 heading">
            <h1 class="text-center white">Dein persönliches Wetter</h1>
            <p class="lead text-center heading">
                Bitte gebe Deine Stadt ein, um das Wetter vor Ort zu ermitteln
            </p>
        </div>
    </div>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="input-group input-group-lg">
                    <input type="text" name="ort" class="form-control" placeholder="Geben Sie den Ort ein...."
                           autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" value="submit" type="submit">Wie wird das
                                Wetter?
                            </button>
                        </span>
                </div><!-- /input-group -->
            </div>
        </div>
    </form>
<!--    --><?php //if (isset($_SESSION['error'])): ; ?>
<!--        <div class="row">-->
<!--            <div class="col-md-8 col-md-offset-2 bottom">-->
<!--                <div class="alert alert-lg alert-danger">-->
<!--                    --><?php
//                    echo $_SESSION['error'];
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //endif;
//    unset($_SESSION['error']); ?>
</div>

<?php if (isset($input)) {

    City::find_weather($input); ?>
    <div class="container">
        <div class="row">
        <?php if (Session::$message):;?>
            <div class="col-md-8 col-md-offset-2 heading">
                <div class="alert alert-warning " role="alert">
                    <?php echo Session::check_message();?>
                </div>
            </div>
        <?php
        endif; ?>
            <div class="col-md-8 col-md-offset-2 heading">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title ">Wettervorschau für <?php echo City::$city_name_selected; ?>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne"
                                           aria-expanded="true" aria-controls="collapseOne">
                                            3 Tage
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <?php echo City::find_weather($input)[1][0]; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion"
                                           href="#collapseTwo" aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            4-6 Tage
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <?php echo City::find_weather($input)[1][1]; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion"
                                           href="#collapseThree" aria-expanded="false"
                                           aria-controls="collapseThree">
                                            7-10 Tage
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <?php echo City::find_weather($input)[1][2]; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>
</body>
</html>
