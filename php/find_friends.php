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

// $query1 = "SELECT * FROM connections  WHERE   user_id = ? ;";
// $stmt1 = $connection->prepare($query1);
// $stmt1->bind_param('s', $id);
// $stmt1->execute();
// $result_blocked = $stmt1->get_result();


// $temp_array_blocked = [];
// while($row_blocked = mysqli_fetch_array($result_blocked) ){
//     $temp_array_blocked[] = $row_blocked;
// }

$temp_array = [];
while($row = mysqli_fetch_array($result) ){
    $temp_array[] = $row;
}



// // print_r($temp_array);
// // echo "////////////////////////////////////////";
// // print_r($temp_array_blocked);
// if (count($temp_array)>0){
// for($i = 0; $i<count($temp_array);$i+=1){
//     for($j = 0; $j<count($temp_array_blocked);$j+=1){
//         if($temp_array[$i][0] === $temp_array_blocked[$j][2]){
//             unset( $temp_array[$i]);
//             break;
//         }
//     }
// }
// }


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;



?>