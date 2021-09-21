<?php
header("Access-Control-Allow-Origin: *");
include "connection.php";
session_start();

$id = $_SESSION["id"] ;
$friend_id = $_POST["friendToBe"];
$name = $_SESSION["name"];
$notification = $name." sent you a friend request";
$two = 2;
echo $id;
$query = "INSERT INTO `connections`(`user_id`, `friend_id`,`type_id`) VALUES (?,?,?) ";
$stmt = $connection->prepare($query);
$stmt->bind_param('sss', $id,$friend_id,$two);
$stmt->execute();


$query1 = "INSERT INTO `notifications`(`user_id`, `sender_id`,`notification`) VALUES (?,?,?) ";
$stmt1 = $connection->prepare($query1);
$stmt1->bind_param('sss',$friend_id,$id,$notification);
$stmt1->execute();

$json = json_encode("success", JSON_PRETTY_PRINT);
echo $json;


?>