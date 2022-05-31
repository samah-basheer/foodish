<?php
include_once '../includes/header.php';
?>
<div class="restaurants-banner"></div>
<?php
    $jsonurl = "http://groupproject/backend/api/get_restaurants.php";
    $json = file_get_contents($jsonurl);
    $rest_arr = (json_decode($json));
    $current_time = date("H:i:s");

    $jsonurlRating = "http://groupproject/backend/api/get_ratings.php";
    $jsonRating = file_get_contents($jsonurlRating);
    $rating_arr = (json_decode($jsonRating));
?>
<div class="container pt-4 pb-5">
    <h2>Restaurants</h2>
    <div class="row">
<?php
    $i = 0;
    foreach ($rest_arr as $rest) {
        if($i % 3 == 0 ) {
            echo '</div><div class="row">';
        }
?>
            <div class="restaurant-details col-md-4 pt-2">
                <a href="./restaurant-details.php?id=<?php echo $rest->id; ?>">
                <div class="rest-img">
                    <img src="../assets/images/<?php echo $rest->pic_url; ?>" alt="" />
                </div>
                <div class="rest-detail">
                    <div class="d-flex justify-space-between align-items">
                        <p class="title"><?php echo $rest->name; ?></p>
                        <span class="reviews"><?php
                            $rating_exist = false;
                            foreach ($rating_arr as $rating) {
                                if($rating->restaurant_id == $rest->id) {
                                    echo number_format($rating->rating, 1);
                                    $rating_exist = true;
                                }
                            }
                            if ($rating_exist == false ) {
                                echo 0;
                            }
                            ?> <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div>
                        <p class="description"><?php echo $rest->description; ?></p>
                    </div>
                </div>
                </a>
            </div>
<?php $i++; } ?>
</div>
</div>
<?php include_once '../includes/footer.php'; ?>
