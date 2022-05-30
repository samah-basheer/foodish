<?php

include("../connection.php");

session_start();
$user_email = $_SESSION['email'];
$restaurant_id = $_POST["restaurant_id"];
$review = $_POST["review"];
$rating = $_POST["rating"];
$status = 0;

$query_id = $mysqli->prepare("SELECT id FROM users WHERE email=?");
$query_id->bind_param("s", $user_email);
$query_id->execute();
$array = $query_id->get_result();
$user_id= $array->fetch_assoc();
$id = $user_id['id'];

$query = $mysqli->prepare("INSERT INTO reviews(user_id, restaurant_id, review, rating, status) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("ssssi", $id, $restaurant_id, $review, $rating, $status);

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);
header('location: http://groupproject/frontend/pages/restaurant-details.php?id='.$restaurant_id);

?>