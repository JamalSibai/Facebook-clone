<?php
include "connection.php";
if(isset($_POST["email"]) && $_POST["email"] != "") {
    $email = $_POST["email"];
}else{
    die ("Enter a valid input");
}
if(isset($_POST["password"]) && $_POST["password"] != "") {
    $password = hash('sha256', $_POST["password"]);
}else{
    die ("Enter a valid input");
}

$stmt = $connection->prepare("Select * from users where email = ? and password = ? ");
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result-> fetch_assoc();
    if(empty($row["email"])){
        session_start();
        $_SESSION["flash"] = "Please check your email and password";
        header('location: ../login.php');
    }else{
        session_start();
        $_SESSION["id"] = $row['id'];
        $_SESSION["email"] = $email;
        $_SESSION["name"]=$row["name"];
        header("Location:../profile-details.php");
    }