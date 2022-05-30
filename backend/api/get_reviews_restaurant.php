<?php
include("../connection.php");

$id = $_GET['id'];
$query = $mysqli->prepare("SELECT RV.id, U.first_name, U.last_name, R.name, review, rating, status 
FROM restaurants R, users U, reviews RV
WHERE R.id = RV.restaurant_id
AND RV.user_id = U.id
AND RV.restaurant_id=?");
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