<?php
session_start();
require_once("classes/session.php");
$translation = parse_ini_file("assets/languages/".$_SESSION['language'].".ini");
print_r(json_encode($translation));