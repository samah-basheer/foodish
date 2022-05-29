<?php
include_once '../includes/header.php';
?>
<?php
    $jsonurl = "http://groupproject/backend/api/get_restaurants.php";
    $json = file_get_contents($jsonurl);
    $rest_arr = (json_decode($json));
?>
<?php
    foreach ($rest_arr as $rest) {
?>
    <div class="resturant-box">
        <div class="p-img-container">
            <div class="p-img">
                <a href="">
                    <img src="../assets/images/<?php echo $rest->pic_url; ?>" alt="" />
                </a>
            </div>
        </div>
        <div class="p-box-text">
            <p class="resturant-name">
                <a href="#" class="rest-title"><span><?php echo $rest->name; ?></span></a>

                <?php
                if($rest->open_hr < $current_time && $current_time < $rest->close_hr) {
                    echo '<span class="rest-status open">open</span>';
                } else {
                    echo '<span class="rest-status close">closed</span>';
                }
                ?>
                </span>
            </p>
            <hr class="rest-seperator" />
            <p class="resturant-description">
                <?php echo $rest->description; ?>
            </p>
        </div>
        <div class="returant-view"></div>
    </div>
<?php } ?>
<?php include_once '../includes/footer.php'; ?>
