<?php
header("Content-type: text/xml");
header('Cache-Control: no-cache');
header('Pragma: no-cache');

echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<xmlresponse>";
echo "<result>";
echo '<item>Paris</item>';
echo '<item>Tokyo</item>';
echo '<item>Rom</item>';
echo '<item>Helsinki</item>';
echo '<item>München</item>';
echo "</result>";
echo '</xmlresponse>';