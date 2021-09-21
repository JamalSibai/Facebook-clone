<?php

include "connection.php";
session_start();

$id = $_SESSION["id"] ;
$sender_id = $_POST["sender_id"];
$three = 3;


$query = "UPDATE `connections` SET `type_id`= ? WHERE `user_id`=? and
`friend_id`=? ";
$stmt = $connection->prepare($query);
$stmt->bind_param('sss', $three , $sender_id , $id);
$stmt->execute();


$query1 = "INSERT INTO `connections`( `user_id`, `friend_id`, `type_id`) 
VALUES (?,?,?) ";
$stmt1 = $connection->prepare($query1);
$stmt1->bind_param('sss', $id,$sender_id,$three);
$stmt1->execute();

$query2 = "DELETE FROM `notifications` WHERE `user_id`=? and
`sender_id`=? ";
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param('ss', $id,$sender_id);
$stmt2->execute();






$json = json_encode("success", JSON_PRETTY_PRINT);
echo $json;
?>