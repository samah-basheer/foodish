<?php
include("../connection.php");

$id = $_GET['id'];
$query = $mysqli->prepare("SELECT id, name, description, open_hr, close_hr, pic_url 
FROM restaurants
WHERE id=?");
$query->bind_param("i", $id);
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
}
$json = json_encode($response);
echo $json;

?>