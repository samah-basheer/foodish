<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
<div class="pt-5">
    <div class="title mt-1 mb-2 d-flex justify-space-between">
        <h1>Add New Restaurant</h1>
    </div>
</div>
<div class="">
    <div class="container restaurant-detail">
        <form action="../../backend/api/add_restaurants.php" method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <label>Add Restaurant Title</label>
                <input type="text" name="name" value="">
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label>Add Restaurant Description</label>
                    <textarea rows="11" name="description"></textarea>
                    <div class="mb-1 mt-2">
                        <label>Add Restaurant Open Hour</label>
                        <input type="time" name="open_hr" value="">
                    </div>
                    <div class="mb-1">
                        <label>Add Restaurant Close Hour</label>
                        <input type="time" name="close_hr" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Add Restaurant Featured Image</label>
                    <img src="">
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
