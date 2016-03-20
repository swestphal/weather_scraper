<?php
/**
 * Created by PhpStorm.
 * User: simonewestphal
 * Date: 18.03.16
 * Time: 10:46
 */

$city = $_Get['city'];
return City::find_weather($city);
 ?>
