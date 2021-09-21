<?php
header("Access-Control-Allow-Origin: *");
include "connection.php";
session_start();

$id = $_SESSION["id"] ;


$query = "SELECT sender_id,notification
from  notifications where  user_id = ?  ";
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