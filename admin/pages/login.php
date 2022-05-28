<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
            rel="stylesheet"
            href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="stylesheet" href="../assets/css/login.css" />
</head>
<body>
<div class="bd">
    <div class="container">
        <div class="forms">
            <!-- Login Form -->
            <div class="form login">
                <span class="title">Login</span>

                <form action="../../backend/api/admin_login.php" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input
                                type="password"
                                name="password"
                                class="password"
                                placeholder="Enter your password"
                                required
                        />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login Now" name="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/login.js"></script>
</body>
</html>
