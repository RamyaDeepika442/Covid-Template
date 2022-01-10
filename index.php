<?php
$host = str_replace("www.", "", $_SERVER['HTTP_HOST']);
$url = "http://" . $host . "/covidtemplate/controller/login.php";
header('Location: ' . $url, true, 301);
?>
