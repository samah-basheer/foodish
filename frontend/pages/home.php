<?php
include_once '../includes/header.php';
?>
    <div class="about">
        <div class="image-sec">
            <img src="../assets/images/about-bg-6-2.png" alt="" />
        </div>
        <div class="text-sec">
            <h1>Discover Our <span style="color: #e63946">Story</span></h1>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni
                commodi doloribus natus. Distinctio rerum repellendus incidunt magni
                molestias sapiente, amet cumque commodi aspernatur corporis nulla
                tempore qui facere veniam rem ea assumenda!
            </p>
        </div>
    </div>

    <div class="our-resturants">
        <div class="content">
            <div class="p-slider">
                <h1 class="resturant-slider-header">Top Resturants</h1>
                <div class="slides">
                    <?php
                    $jsonurl = "http://groupproject/backend/api/get_restaurants.php";
                    $json = file_get_contents($jsonurl);
                    $rest_arr = (json_decode($json));
                    $current_time = date("H:i:s");

                    foreach (array_slice($rest_arr, 0, 3) as $rest) {
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
                            <p class="resturant-description">
                                <?php echo $rest->description; ?>
                            </p>
                        </div>
                        <div class="returant-view"></div>
                    </div>
                    <?php } ?>
                </div>
                <button class="resturants-view"><a href="./restaurants.php">View All</a></button>
            </div>
        </div>
    </div>
<?php include_once '../includes/footer.php'; ?>