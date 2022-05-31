<?php

include("../connection.php");

$user_id = $_POST["user_id"];
$restaurant_id = $_POST["restaurant_id"];
$review = $_POST["review"];
$rating = $_POST["rating"];
$status = 0;

$query = $mysqli->prepare("INSERT INTO reviews(user_id, restaurant_id, review, rating, status) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("iisii", $user_id, $restaurant_id, $review, $rating, $status);

$response = [];
if($query->execute()) {
    $response["status"] = true;
    $response["message"] = "Added successfully!";
} else {
    $response["status"] = false;
    $response["message"] = "Sorry! something went wrong.";
}
echo json_encode($response);