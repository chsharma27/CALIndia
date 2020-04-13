<?php
$dbhost="localhost";
$dbuser="root";
$dbpwd="password";
$dbname="login_system";
$link=mysqli_connect($dbhost,$dbuser,$dbpwd) or die("Fail");
mysqli_select_db($link,$dbname) or die("db not found");
?>
