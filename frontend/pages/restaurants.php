<?php
include_once '../includes/header.php';
?>
<?php
    $jsonurl = "http://groupproject/backend/api/get_restaurants.php";
    $json = file_get_contents($jsonurl);
    $rest_arr = (json_decode($json));
    $current_time = date("H:i:s");
?>
<div class="container pt-4 pb-5">
    <div class="row justify-space-between">
<?php
    $i = 0;
    foreach ($rest_arr as $rest) {
        if($i % 3 == 0 ) {
            echo '</div><div class="row justify-space-between pt-3">';
        }
?>
            <div class="restaurant-details col-md-4">
                <div class="rest-img">
                    <img src="../assets/images/<?php echo $rest->pic_url; ?>" alt="" />
                </div>
                <div class="rest-detail">
                    <p class="title"><?php echo $rest->name; ?></p>
                    <p class="description"><?php echo $rest->description; ?></p>
                </div>
            </div>
<?php $i++; } ?>
</div>
</div>
<?php include_once '../includes/footer.php'; ?>
