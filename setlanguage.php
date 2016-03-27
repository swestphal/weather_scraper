<?php
session_start();
//header("Content-type: text/xml");
//header('Cache-Control: no-cache');
//header('Pragma: no-cache');
require_once("classes/session.php");
$language = $_GET['language'];
Session::set_language($language);
echo Session::get_language();




