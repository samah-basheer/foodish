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
    <link rel="stylesheet" href="./frontend/assets/css/login.css" />
</head>
<body>
<div class="bd">
    <div class="container">
        <div class="forms">
            <!-- Login Form -->
            <div class="form login">
                <span class="title">Login</span>

                <form action="./backend/api/user_login.php" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input
                            type="password"
                            class="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                        />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login Now" />
                    </div>
                </form>

                <div class="login-signup">
              <span class="text">Not a member?
                <a href="#" class="text signup-link">Signup now</a>
              </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form action="./backend/api/add_users.php" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your first name" name="first_name" required />
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your last name" name="last_name" required />
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input
                            type="password"
                            class="password"
                            name="password"
                            placeholder="Create a password"
                            required
                        />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login Now" />
                    </div>
                </form>

                <div class="login-signup">
              <span class="text"
              >You're a member?
                <a href="#" class="text login-link">Login Now</a>
              </span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./frontend/assets/js/login.js"></script>
</body>
</html>
