<?php
include("../connection.php");
$query = $mysqli->prepare("SELECT id, name, description, open_hr, close_hr, pic_url 
FROM restaurants");
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
}
$json = json_encode($response);
echo $json;

?>