<?php

include "connection.php";
session_start();

$id = $_SESSION["id"] ;
$sender_id = $_POST["sender_id"];



$query = "DELETE FROM `connections` WHERE `user_id`=? and
`friend_id`=?  ";
$stmt = $connection->prepare($query);
$stmt->bind_param('ss',  $sender_id , $id);
$stmt->execute();




$query2 = "DELETE FROM `notifications` WHERE `user_id`=? and
`sender_id`=? ";
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param('ss', $id,$sender_id);
$stmt2->execute();






$json = json_encode("success", JSON_PRETTY_PRINT);
echo $json;
?>