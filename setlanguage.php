<?php
header("Content-type: text/xml");
header('Cache-Control: no-cache');
header('Pragma: no-cache');
require_once("classes/session.php");
$language = $_POST['language'];
Session::set_language($language);

echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<xmlresponse>";
echo "<result>";
echo '<language>'.Session::get_language().'</language>';
echo "</result>";
echo '</xmlresponse>';



