<?php
include("../connection.php");
$query = $mysqli->prepare("SELECT U.first_name, U.last_name, R.name, review, rating, status 
FROM restaurants R, users U, reviews RV
WHERE R.id = RV.restaurant_id
AND RV.user_id = U.id");
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
}
$json = json_encode($response);
echo $json;

?>