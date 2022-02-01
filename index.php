<?php
$host = str_replace("www.", "", $_SERVER['HTTP_HOST']);
$url = "http://" . $host . "/covidtemplatecopy/controller/loginform.php";
header('Location: ' . $url, true, 301);
?>
