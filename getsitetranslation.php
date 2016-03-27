<?php
session_start();
require_once("classes/session.php");
$file =$_SESSION['language'].".ini";
$translation = parse_ini_file("assets/languages/".$file);
print_r(json_encode($translation));