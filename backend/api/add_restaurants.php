<?php

include("../connection.php");

$name = $_POST["name"];
$description = $_POST["description"];
$open_hr = $_POST["open_hr"];
$close_hr = $_POST["close_hr"];
$pic_url = $_POST["pic_url"];

$query = $mysqli->prepare("INSERT INTO restaurants(name, description, open_hr, close_hr, pic_url) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("sssss", $name, $description, $open_hr, $close_hr, $pic_url);
$query->execute();

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);

?>