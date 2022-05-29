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
    $response["success"] = true;
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["name"] = $_POST["first_name"];
    header('location: http://groupproject/frontend/pages/home.php');
} else {
    $response["success"] = false;
    header('location: http://groupproject/');
}
echo json_encode($response);

?>