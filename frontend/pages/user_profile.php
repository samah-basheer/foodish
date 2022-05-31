<?php
include_once '../includes/header.php';
?>
<div class="restaurants-banner-details"></div>

<div class="container pt-5 pb-5">
    <div class="user_profile">
        <div class="row pt-3">
            <div class="col-md-4">
                <img src="../assets/images/profile_pic.jpg">
            </div>
            <div class="col-md-8">
                <h2>Welcome Back</h2>
                <p class="status" id="status_update_profile"></p>
                <div class="input">
                    <label>First Name</label>
                    <input type="text" value="" id="fname">
                </div>
                <div class="input">
                    <label>Last Name</label>
                    <input type="text" value="Basheer" id="lname">
                </div>
                <div class="pt-3 text-right">
                    <button class="user-profile-btn" id="user_profile_btn">
                        Update Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php'; ?>