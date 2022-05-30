<?php
session_start();
include("../connection.php");


$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);

$query = $mysqli->prepare("SELECT id FROM users WHERE email=? AND password=? AND role=0");
$query->bind_param("ss", $email, $password);
$query->execute();

$query->store_result();

$num_rows = $query->num_rows;
$query->bind_result($id);

$query->fetch();

$response = [];
if($num_rows == 0){
    $_SESSION["response"] = "Incorrect email and/or password.";
    header('location: http://groupproject');
}else{
    $response["response"] = "Logged in";
    $response["user_id"] = $id;
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["id"] = $id;
    $_SESSION["response"] = "";
    header('location: http://groupproject/frontend/pages/home.php');
}
$json = json_encode($response);
echo $json;