<?php

$dbname = "site_web";
$user = "root";
$pass = "root";
$host = "localhost";


$con = mysqli_connect($host, $user, $pass) or die(mysqli_error($con));
mysqli_select_db($con, $dbname)  or die(mysqli_error($con));