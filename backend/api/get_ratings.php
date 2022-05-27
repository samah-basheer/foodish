<?php
include("../connection.php");
$query = $mysqli->prepare("SELECT restaurant_id, avg(rating) as rating
FROM reviews
group by restaurant_id");
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
}
$json = json_encode($response);
echo $json;

?>