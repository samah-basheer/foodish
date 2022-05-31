<?php
include("../connection.php");
$id = $_POST['id'];
$query = $mysqli->prepare("SELECT id, first_name, last_name, email, pic_url 
FROM users
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