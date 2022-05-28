<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
    <div class="pt-5">
        <div class="title mt-1 mb-2">
            <h1>Reviews</h1>
        </div>
    </div>
    <div class="container reviews-loop">
        <div class="row">
        <?php
        $jsonurl = "http://groupproject/backend/api/get_reviews.php";
        $json = file_get_contents($jsonurl);
        $reviews_arr = (json_decode($json));

        $i = 0;

        if(empty($reviews_arr)) {
            echo 'You have no reviews.';
        }
        foreach ($reviews_arr as $review) {
            if($i % 2 == 0) echo '</div><div class="row">';
            ?>
            <div class="col-md-6 mb-1">
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
                            <div class="status">
                                <?php
                                if($review->status == 0) {
                                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                    echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                }
                                ?>
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
            $i++;
        }
        ?>
    </div>
<?php include '../includes/footer.php' ?>