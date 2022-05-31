<?php
include("../connection.php");

$id = $_POST['id'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];

$query = $mysqli->prepare("UPDATE users 
SET first_name=?, last_name=?
WHERE id=?");
$query->bind_param("ssi", $fname, $lname, $id);

$response = [];
if($query->execute()) {
    $response["status"] = true;
} else {
    $response["status"] = false;
    $response["message"] = "Failed to update!";
}
echo json_encode($response);