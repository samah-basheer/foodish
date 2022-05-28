<?php

include("../connection.php");

$name = $_POST["name"];
$description = $_POST["description"];
$open_hr = $_POST["open_hr"];
$close_hr = $_POST["close_hr"];
$pic_url = $_POST["pic_url"];
$id = $_POST['id'];

$query = $mysqli->prepare("UPDATE restaurants 
SET name=?, description=?, open_hr=?, close_hr=?, pic_url=?
WHERE id=?");
$query->bind_param("sssssi", $name, $description, $open_hr, $close_hr, $pic_url, $id);
$query->execute();

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}
echo json_encode($response);
header('location: http://groupproject/admin/pages/restaurant_details.php?id='.$id);

?>