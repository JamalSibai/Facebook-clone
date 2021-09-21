<?php

include "connection.php";
session_start();

$id = $_SESSION["id"] ;


$query = "SELECT * FROM users u,connections c WHERE u.id = c.friend_id and c.user_id = ? and c.type_id = '3' ";
$stmt = $connection->prepare($query);
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();



$temp_array = [];
while($row = mysqli_fetch_array($result) ){
    $temp_array[] = $row;
}


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
?>