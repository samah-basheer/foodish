<?php

include("../connection.php");

$user_id = $_POST["user_id"];
$restaurant_id = $_POST["restaurant_id"];
$review = $_POST["review"];
$rating = $_POST["rating"];

$query = $mysqli->prepare("INSERT INTO reviews(user_id, restaurant_id, review, rating) VALUES (?, ?, ?, ?)");
$query->bind_param("ssss", $user_id, $restaurant_id, $review, $rating);
$query->execute();

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);

?>