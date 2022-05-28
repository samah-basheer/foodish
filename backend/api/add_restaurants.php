<?php

include("../connection.php");

$name = $_POST["name"];
$description = $_POST["description"];
$open_hr = $_POST["open_hr"];
$close_hr = $_POST["close_hr"];
$pic_url = $_FILES["pic_url"]["name"];

$target_dir = "../../assets/images/";
$target_file = $target_dir . basename($_FILES["pic_url"]["name"]);
move_uploaded_file($_FILES["pic_url"]["tmp_name"], $target_file);

$query = $mysqli->prepare("INSERT INTO restaurants (name, description, open_hr, close_hr, pic_url) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("sssss", $name, $description, $open_hr, $close_hr, $pic_url);

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);
header('location: http://groupproject/admin/pages/restaurant.php');

?>