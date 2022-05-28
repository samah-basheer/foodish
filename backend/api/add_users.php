<?php

include("../connection.php");

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);
$pic_url = $_POST["pic_url"];

$query = $mysqli->prepare("INSERT INTO users(first_name, last_name, email, password, pic_url) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("sssss", $first_name, $last_name, $email, $password, $pic_url);

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);

?>