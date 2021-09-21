<?php

include "connection.php";
session_start();
$email = $_SESSION["email"];
$id = $_SESSION["id"] ;
$name = $_POST["name"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];


$query = "UPDATE `users` SET `name`= ? ,`phone`= ? ,
`gender`= ? where id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param('ssss', $name,$phone,$gender,$id);
$stmt->execute();


$temp_array = [];
$temp_array["id"] = $id ;
$temp_array["name"] = $name;
$temp_array["email"] = $email;
$temp_array["phone"] = $phone;
$temp_array["gender"] = $gender;


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
?>