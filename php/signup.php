<?php
// functions
function number_check($phone){
    $pos = strpos($phone,"+961");
    if((strlen($phone)== 11 || strlen($phone)== 12) && $pos == 0){
        return true;
    }else{
        return false;
    }
}

function name_check($name){
    if(strlen($name)<3){
        return true;
    }
}

function email_check($email){
    $pos_dot = strripos($email,".");
    $pos_at = strripos($email,"@");
    if($pos_dot<$pos_at){
        return true;
    }
}


// end

include "connection.php";
if(isset($_POST["name"]) && $_POST["name"] != "" && strlen($_POST["name"])) {
    $name = $_POST["name"];
}else{
    die ("Enter a valid input");
}


if(isset($_POST["phone_number"]) && $_POST["phone_number"] != "" ) {
    $phone_number = $_POST["phone_number"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["email"]) && $_POST["email"] != "") {
    $email = $_POST["email"];
}else{
    die ("Enter a valid input");
}


if(isset($_POST["password"]) && $_POST["password"] != "") {
    $checkpassword = $_POST["password"];
    $password = hash('sha256', $_POST["password"]);
}else{
    die ("Enter a valid input");
}

if(isset($_POST["confirmpass"]) && $_POST["confirmpass"] != "") {
    $confirmpass = hash('sha256', $_POST["confirmpass"]);
}else{
    die ("Enter a valid input");
}

if(isset($_POST["usertype"]) && $_POST["usertype"] != "") {
    $usertype = $_POST["usertype"];
}else{
    die ("Enter a valid input");
}




    if(name_check($name) ){
        session_start();
        $_SESSION["alert"] = "name < 3 characters";
        header("Location:../signup.php");
    }else if ( number_check($phone_number) == false){
        session_start();
        $_SESSION["alert"] = "phone number not valid('+961')";
        header("Location:../signup.php");
    }else if(email_check($email)){
        session_start();
        $_SESSION["alert"] = "Email not valid";
        header("Location:../signup.php");
    }else if($password != $confirmpass || strlen($checkpassword)<5 ){
        session_start();
        $_SESSION["alert"] = "password invalid";
        header("Location:../signup.php");
    }else{

    $stmt = $connection->prepare("Select email from users where email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result-> fetch_assoc();
    if(empty($row["email"])){
        $x = $connection->prepare("INSERT INTO `users` (`name`, `phone`, `email`, `password`, `gender`) VALUES (?, ?, ?, ?, ?)");
        $x->bind_param("sssss", $name, $phone_number, $email, $password, $usertype);
        $x->execute();
        $result2 = $x->get_result();
        header("Location:../login.php");
    }else{
        session_start();
        $_SESSION["flash"] = "Email already exists";
        header("Location:../signup.php");

    } 
}

    





























