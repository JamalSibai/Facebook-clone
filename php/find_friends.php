<?php

include "connection.php";
session_start();

$id = $_SESSION["id"] ;
$name = '%'.$_POST["name"].'%';

$query = "SELECT id,name,phone,gender FROM users WHERE name LIKE ? and
id IN (SELECT id FROM `users` WHERE id != ?
EXCEPT
SELECT friend_id  from connections WHERE user_id = ?) ";
$stmt = $connection->prepare($query);
$stmt->bind_param('sss',$name, $id, $id);
$stmt->execute();
$result = $stmt->get_result();



$temp_array = [];
while($row = mysqli_fetch_array($result) ){
    $temp_array[] = $row;
}






$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;



?>