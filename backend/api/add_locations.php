<?php

include("../connection.php");

$restaurant_id = $_POST["restaurant_id"];
$location = $_POST["location"];


$query = $mysqli->prepare("INSERT INTO locations(restaurant_id, location) VALUES (?, ?)");
$query->bind_param("ss", $restaurant_id, $location);
$query->execute();

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}


echo json_encode($response);

?>