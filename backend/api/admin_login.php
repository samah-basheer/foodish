<?php
include("../connection.php");

$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);

$query = $mysqli->prepare("SELECT id FROM users WHERE email=? AND password=? AND role=1");
$query->bind_param("ss", $email, $password);
$query->execute();

$query->store_result();

$num_rows = $query->num_rows;
$query->bind_result($id);

$query->fetch();

$response = [];
if($num_rows == 0){
    $response["status"] = false;
    $response["message"] = "User Not Found";
}else{
    $response["status"] = true;
    $response["message"] = "Logged in";
    $response["user_id"] = $id;
}
$json = json_encode($response);
echo $json;