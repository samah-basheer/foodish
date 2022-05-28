<?php include '../includes/header.php' ?>
<?php include '../includes/sidebar.php' ?>
    <div class="pt-5">
        <div class="title mt-1 mb-2">
            <h1>Users</h1>
        </div>
    </div>
    <div class="container users-loop">
        <?php
        $jsonurl = "http://groupproject/backend/api/get_users.php";
        $json = file_get_contents($jsonurl);
        $users_arr = (json_decode($json));

        foreach ($users_arr as $user) {
        ?>
        <div class="mb-1">
                <div class="restaurant d-flex">
                    <div class="initial-name">
                        <div>
                            <span><?php echo substr($user->first_name, 0, 1); ?></span>
                        </div>
                    </div>
                    <div class="pl-1 w-100">
                        <div class="d-flex justify-space-between align-items">
                            <div class="d-flex">
                                <h3 class="user-name"><?php echo $user->first_name. ' '. $user->last_name ?></h3>
                            </div>
                            <div class="actions">
                                <form action="../../backend/api/delete_user.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo  $user->id; ?>">
                                    <button type="submit">
                                        <i class="fa fa-trash-o trash-icon" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p><?php echo $user->email; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php include '../includes/footer.php' ?>