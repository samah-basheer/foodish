<?php

include("../connection.php");

$id = $_POST['id'];
$name = $_POST["name"];
$description = $_POST["description"];
$open_hr = $_POST["open_hr"];
$close_hr = $_POST["close_hr"];
if(!empty($_FILES["pic_url"]["name"])) {
    $pic_url = $_FILES["pic_url"]["name"];
    $target_dir = "../../frontend/assets/images/";
    $target_file = $target_dir . basename($_FILES["pic_url"]["name"]);
    move_uploaded_file($_FILES["pic_url"]["tmp_name"], $target_file);
} else {
    $query = $mysqli->prepare("SELECT pic_url
    FROM restaurants
    WHERE id=?");
    $query->bind_param("i", $id);
    $query->execute();
    $array = $query->get_result();
    $response = [];
    $restaurant = $array->fetch_assoc();
    $response[] = $restaurant;
    $pic_url = $response[0]['pic_url'];
}

$query = $mysqli->prepare("UPDATE restaurants 
SET name=?, description=?, open_hr=?, close_hr=?, pic_url=?
WHERE id=?");
$query->bind_param("sssssi", $name, $description, $open_hr, $close_hr, $pic_url, $id);

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);
header('location: http://groupproject/admin/pages/restaurant_details.php?id='.$id);

?>