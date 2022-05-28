<?php

include("../connection.php");

$id = $_POST["id"];

$query = $mysqli->prepare("DELETE FROM restaurants WHERE id=?");
$query->bind_param("i", $id);
$query->execute();

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;

}
header('Location: http://groupproject/admin/pages/restaurant.php');

?>