<?php
session_start();
include("../connection.php");

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);

$query = $mysqli->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
$query->bind_param("ssss", $first_name, $last_name, $email, $password);

$response = [];
if($query->execute()) {
    $response["status"] = true;
    $response["message"] = "User Created";
    $response["id"] = $mysqli->insert_id;
} else {
    $response["status"] = false;
    $response["message"] = "Fail to create new user.";
}
echo json_encode($response);

?>