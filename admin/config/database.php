<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "phpdasar";

$db = mysqli_connect($host, $user, $pass, $db_name);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
