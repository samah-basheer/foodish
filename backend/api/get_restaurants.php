<?php
include("../connection.php");
$query = $mysqli->prepare("SELECT R.id, name, description, open_hr, close_hr, pic_url, location 
FROM restaurants R, locations L 
WHERE R.id = L.restaurant_id");
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
}
$json = json_encode($response);
echo $json;

?>