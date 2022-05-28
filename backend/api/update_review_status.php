<?php
include("../connection.php");

$id = $_POST['id'];

$query = $mysqli->prepare("UPDATE reviews 
SET status=1
WHERE id=?");
$query->bind_param("i", $id);

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);

header('location: http://groupproject/admin/pages/reviews.php');