<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: simonewestphal-->
<!-- * Date: 20.03.16-->
<!-- * Time: 08:50-->
<!-- */-->

<div class="container container-output">
    <div class="row">
        <?php if (Session::$message):; ?>
            <div class="small-11">
                <div class="alert alert-warning " role="alert">
                    <?php echo Session::check_message(); ?>
                </div>
            </div>
            <?php
        endif; ?>
        <div class="small-11 medium-8 small-centered columns">
            <div class=""><h3>Wettervorschau für <span id="city_location"></span></h3>
                <ul class="tabs" data-tabs id="example-tabs">
                    <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">3 Tage</a></li>
                    <li class="tabs-title"><a href="#panel2">4-6 Tage</a></li>
                    <li class="tabs-title"><a href="#panel3">7-10 Tage</a></li>
                </ul>
            </div>


            <div class="tabs-content" data-tabs-content="example-tabs">
                <div class="tabs-panel is-active" id="panel1">
                    <div id="forecast_3days"></div>
                </div>
                <div class="tabs-panel" id="panel2">
                    <div id="forecast_3to6days"></div>
                </div>
                <div class="tabs-panel" id="panel3">
                    <div id="forecast_7to10days"></div>
                </div>
            </div>
        </div>
    </div>
</div>

