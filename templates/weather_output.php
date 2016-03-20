<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: simonewestphal-->
<!-- * Date: 20.03.16-->
<!-- * Time: 08:50-->
<!-- */-->

<div class="container collapse-container collapse">
    <div class="row">
        <?php if (Session::$message):; ?>
            <div class="col-md-8 col-md-offset-2 heading">
                <div class="alert alert-warning " role="alert">
                    <?php echo Session::check_message(); ?>
                </div>
            </div>
            <?php
        endif; ?>
        <div class="col-md-8 col-md-offset-2 heading">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title ">Wettervorschau für <span id="city_selected"></span>
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
                                   <div id="forecast_3days"></div>
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
                                    <div id="forecast_3to6days"></div>
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
                                    <div id="forecast_7to10days"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>