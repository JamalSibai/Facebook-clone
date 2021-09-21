<?php

include "connection.php";
session_start();

$id = $_SESSION["id"] ;
$friend_id = $_POST["friend_id"];


$query = "UPDATE `connections` SET `type_id`= '1' WHERE `user_id`=? and
`friend_id`=? ";
$stmt = $connection->prepare($query);
$stmt->bind_param('ss',  $id , $friend_id);
$stmt->execute();

$query = "UPDATE `connections` SET `type_id`= '1' WHERE `user_id`=? and
`friend_id`=? ";
$stmt = $connection->prepare($query);
$stmt->bind_param('ss',  $friend_id, $id);
$stmt->execute();





$json = json_encode("success", JSON_PRETTY_PRINT);
echo $json;
?>