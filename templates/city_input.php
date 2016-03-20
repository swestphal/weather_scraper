<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: simonewestphal-->
<!-- * Date: 20.03.16-->
<!-- * Time: 08:50-->
<!-- */-->
<div class="container">
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
</div>