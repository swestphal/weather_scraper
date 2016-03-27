<?php
header("Content-type: text/xml");
header('Cache-Control: no-cache');
header('Pragma: no-cache');
session_start();
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<xmlresponse>";
echo "<result>";
echo '<language>new</language>';
echo "</result>";
echo '</xmlresponse>';