<?php
/**
 * Created by PhpStorm.
 * User: simonewestphal
 * Date: 20.03.16
 * Time: 09:11
 */


require_once 'animal.php';

if(isset( $_GET['invoiceno'] )) {
    $myAnimal = new animal();
    $result = $myAnimal->getName();
    echo "huhu";
}

echo $result;