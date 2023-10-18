<?php

$host = "localhost";
$user = "root";
$pass = "" ;
$db = "pt-web";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("failed to connect.".mysqli_connect_error());
}

?>