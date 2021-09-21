<?php

include "connection.php";
session_start();

$id = $_SESSION["id"] ;
$friend_id = $_POST["friend_id"];



$query = "DELETE FROM `connections` WHERE `user_id`=? and
`friend_id`=?  ";
$stmt = $connection->prepare($query);
$stmt->bind_param('ss',  $id, $friend_id);
$stmt->execute();

$query1 = "DELETE FROM `connections` WHERE `user_id`=? and
`friend_id`=?  ";
$stmt1 = $connection->prepare($query1);
$stmt1->bind_param('ss', $friend_id, $id);
$stmt1->execute();



$json = json_encode("success", JSON_PRETTY_PRINT);
echo $json;
?>