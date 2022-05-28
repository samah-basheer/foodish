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
        <form action="../../backend/api/edit_restaurant.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $rest_details[0]->id; ?>">
            <div class="mb-2">
                <label>Edit Restaurant Title</label>
                <input type="text" name="name" value="<?php echo $rest_details[0]->name ?>">
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label>Edit Restaurant Description</label>
                    <textarea rows="11" name="description"><?php echo $rest_details[0]->description ?></textarea>
                    <div class="mb-1 mt-2">
                        <label>Edit Restaurant Open Hour</label>
                        <input type="time" name="open_hr" value="<?php echo $rest_details[0]->open_hr ?>">
                    </div>
                    <div class="mb-1">
                        <label>Edit Restaurant Close Hour</label>
                        <input type="time" name="close_hr" value="<?php echo $rest_details[0]->close_hr ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Edit Restaurant Featured Image</label>
                    <img src="../../assets/images/<?php echo $rest_details[0]->pic_url ?>">
                    <input type="file" accept="image/*" name="pic_url">
                </div>
                <div class="col-md-12 text-right">
                    <div>
                        <button type="submit" class="save-changes">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include '../includes/footer.php' ?>
