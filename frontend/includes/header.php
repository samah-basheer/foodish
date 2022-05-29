<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
    header('location: http://groupproject/');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FOODISH</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="icon" type="image/x-icon" href="../assets/images/foodish-logo.png">
</head>
<body>
<nav class="navbar">
    <div class="nav-content">
        <div class="logo">
            <a href="/">
                <img src="../assets/images/foodish-logo.png" style="max-width: 50px;">
                <span style="margin-left: 12px;">FOODISH</span>
            </a>
        </div>
        <ul class="menu-list">
            <div class="icon cancel-btn">
                <i class="fas fa-times"></i>
            </div>
            <li><a href="./home.php">Home</a></li>
            <li><a href="./restaurants.php">Resturants</a></li>
            <li><a href="../pages/logout.php">Logout</a></li>
        </ul>
        <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>
<div class="banner"></div>