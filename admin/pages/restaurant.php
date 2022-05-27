<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
    <div class="pt-5">
        <div class="title mt-1 mb-2">
            <h1>Restaurants</h1>
        </div>
    </div>
    <div class="container restaurant-loop" id="restaurants">
        <div class="row">
        <?php
        $jsonurl = "http://groupproject/backend/api/get_restaurants.php";
        $json = file_get_contents($jsonurl);
        $rest_arr = (json_decode($json));
        $i = 0;
        $current_time = date("H:i:s");

        foreach ($rest_arr as $rest) {
            if($i % 2 == 0) echo '</div><div class="row">';
            ?>
            <div class="col-md-6 mb-1">
                <div class="restaurant d-flex">
                    <div>
                        <img src="../../assets/images/<?php echo $rest->pic_url ?>">
                    </div>
                    <div class="pl-1 w-100">
                        <div class="d-flex justify-space-between align-items">
                            <h3><?php echo $rest->name ?></h3>
                            <div>
                                <i class="fa fa-pencil-square-o edit-icon" aria-hidden="true"></i>
                                <i class="fa fa-trash-o trash-icon" aria-hidden="true"></i>
                            </div>
                        </div>
                        <p><?php echo $rest->description ?></p>
                        <div class="text-right">
                            <span class="status">
                                <?php
                                if($rest->open_hr < $current_time && $current_time < $rest->close_hr) {
                                    echo 'Open now';
                                } else {
                                    echo 'closed';
                                }
                                ?>
                            </span>
                            <span>|</span>
                            <span class="reviews">0 <i class="fa fa-star" aria-hidden="true"></i></span>
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