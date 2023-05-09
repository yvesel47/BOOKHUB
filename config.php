<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "bookhub";

$connection = mysqli_connect($host, $username, $password, $database_name);

if (!$connection) {
    die("Login failed: " . mysqli_connect_error());
}
?>