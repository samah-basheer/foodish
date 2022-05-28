<?php

include("../connection.php");

$id = $_POST["id"];

$query = $mysqli->prepare("DELETE FROM users WHERE id=?");
$query->bind_param("i", $id);

$response = [];
if($query->execute()) {
    $response["success"] = true;
} else {
    $response["success"] = false;

}
header('Location: http://groupproject/admin/pages/users.php');

?>