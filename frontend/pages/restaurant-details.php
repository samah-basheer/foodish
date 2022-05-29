<?php
include_once '../includes/header.php';
?>
<?php
    $id = $_GET['id'];

    $jsonurl = "http://groupproject/backend/api/get_restaurant_details.php?id=".$id;
    $json = file_get_contents($jsonurl);
    $rest_details = (json_decode($json));

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
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include_once '../includes/footer.php'; ?>
