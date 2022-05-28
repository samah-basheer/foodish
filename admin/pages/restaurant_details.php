<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
<?php
$id = $_GET['id'];
$jsonurl = "http://groupproject/backend/api/get_restaurant_details.php?id=".$id;
$json = file_get_contents($jsonurl);
$rest_details = (json_decode($json));
?>

<div class="pt-5">
    <div class="container restaurant-detail">
        <form>
            <div class="mb-2">
                <label>Edit Restaurant Title</label>
                <input type="text" value="<?php echo $rest_details[0]->name ?>">
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label>Edit Restaurant Description</label>
                    <textarea rows="11"><?php echo $rest_details[0]->description ?></textarea>
                </div>
                <div class="col-md-4">
                    <label>Edit Restaurant Featured Image</label>
                    <img src="../../assets/images/<?php echo $rest_details[0]->pic_url ?>">
                    <input type="file">
                </div>
            </div>
        </form>
    </div>
</div>
<?php include '../includes/footer.php' ?>
