<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookings";

$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die ("Connection failed! " . mysqli_connect_error());
}
?>