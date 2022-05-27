<?php
include("../connection.php");
$query = $mysqli->prepare("SELECT id, first_name, last_name, email, pic_url 
FROM users");
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
}
$json = json_encode($response);
echo $json;

?>