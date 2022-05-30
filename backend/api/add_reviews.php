<?php

include("../connection.php");

$user_id = $_POST["user_id"];
$restaurant_id = $_GET["id"];
$review = $_POST["review"];
$rating = $_POST["rating"];
$status = 0;

$query = $mysqli->prepare("INSERT INTO reviews(user_id, restaurant_id, review, rating, status) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("ssssi", $user_id, $restaurant_id, $review, $rating, $status);

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);
header('location: http://groupproject/frontend/pages/restaurant-details.php?id='.$restaurant_id);

?>