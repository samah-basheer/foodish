<?php
include_once '../includes/header.php';
?>
<div class="restaurants-banner-details"></div>
<?php
    $id = $_GET['id'];

    $jsonurl = "http://groupproject/backend/api/get_restaurant_details.php?id=".$id;
    $json = file_get_contents($jsonurl);
    $rest_details = (json_decode($json));

    $jsonurl = "http://groupproject/backend/api/get_reviews_restaurant.php?id=".$id;
    $json = file_get_contents($jsonurl);
    $review_details = (json_decode($json));

?>
<section class="bg-color">
    <div class="container pt-5 pb-5">
        <div class="row single-rest">
            <div class="col-md-6">
                <div>
                    <img src="../assets/images/<?php echo $rest_details[0]->pic_url; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <p class="title"><?php echo $rest_details[0]->name; ?></p>
                    <p class="description"><?php echo $rest_details[0]->description; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="reviews-loop pt-5">
                    <div class="add-review pt-2">
                        <h3 class="pb-2">Add your review</h3>
                        <form method="post">
                            <div class="rating">
                                <input type="radio" class="stars" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" class="stars" name="rating" value="4" id="4"><label for="4">☆</label>
                                <input type="radio" class="stars" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" class="stars" name="rating" value="2" id="2"><label for="2">☆</label>
                                <input type="radio" class="stars" name="rating" value="1" id="1"><label for="1">☆</label>
                            </div>
                            <input type="hidden" value="<?php echo $_GET['id']; ?>" name="restaurant_id" id="restaurant_id">
                            <textarea rows="8" placeholder="Any review? Add yours here." name="review" id="review"></textarea>
                            <p id="status"></p>
                            <p class="text-right">
                                <button class="add-review-btn mt-1" id="submit_review">Submit</button>
                            </p>
                        </form>
                    </div>
                    <h3 class="pb-2">Reviews</h3>
                    <?php
                    if(empty($review_details)) {
                        echo 'No reviews yet.';
                    }
                    foreach ($review_details as $review) {
                        if($review->status == 1) {
                        ?>
                        <div class="review-single mb-1">
                            <div class="restaurant d-flex">
                                <div class="initial-name">
                                    <div>
                                        <span><?php echo ucfirst(substr($review->first_name, 0, 1)); ?></span>
                                    </div>
                                </div>
                                <div class="pl-1 w-100">
                                    <div class="d-flex justify-space-between align-items">
                                        <div class="">
                                            <h3><?php echo ucfirst($review->first_name). ' '.ucfirst($review->last_name); ?></h3>
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
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>
<?php include_once '../includes/footer.php'; ?>
