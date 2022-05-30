<?php
include_once '../includes/header.php';
?>
<?php
    $id = $_GET['id'];

    $jsonurl = "http://groupproject/backend/api/get_restaurant_details.php?id=".$id;
    $json = file_get_contents($jsonurl);
    $rest_details = (json_decode($json));

    $jsonurl = "http://groupproject/backend/api/get_reviews_restaurant.php?id=".$id;
    $json = file_get_contents($jsonurl);
    $review_details = (json_decode($json));

?>
<div class="container pt-5 pb-5">
    <div class="row single-rest">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div>
                <img src="../assets/images/<?php echo $rest_details[0]->pic_url; ?>">
            </div>
            <div>
                <p class="title"><?php echo $rest_details[0]->name; ?></p>
                <p class="description"><?php echo $rest_details[0]->description; ?></p>
            </div>
            <div class="reviews-loop pt-5">
                <h3 class="pb-2">Reviews</h3>
                <?php
                if(empty($review_details)) {
                    echo 'No reviews yet.';
                }
                foreach ($review_details as $review) {
                ?>
                <div class="review-single mb-1">
                    <div class="restaurant d-flex">
                        <div class="initial-name">
                            <div>
                                <span><?php echo substr($review->first_name, 0, 1); ?></span>
                            </div>
                        </div>
                        <div class="pl-1 w-100">
                            <div class="d-flex justify-space-between align-items">
                                <div class="d-flex">
                                    <h3><?php echo $review->first_name. ' '. $review->last_name ?></h3>
                                    <div class="review-stars">
                                        <?php
                                        for ($j = 0; $j < $review->rating; $j++) {
                                            echo '<span class="fa fa-star checked"></span>';
                                        }
                                        for ($j = $review->rating; $j < 5; $j++) {
                                            echo '<span class="fa fa-star"></span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <p><?php echo $review->review; ?></p>
                            <div class="text-right">
                                <span class="restaurant-name"><?php echo $review->name; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include_once '../includes/footer.php'; ?>
