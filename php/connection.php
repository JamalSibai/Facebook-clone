<?php
header("Access-Control-Allow-Origin: *");
$server = "localhost";
$username = "root";
$password = "";
$dbname = "facebook_db";

$connection = new mysqli($server, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Failed");
}
