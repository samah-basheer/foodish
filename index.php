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

                <form action="#" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" id="email" name="email" required />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input
                            type="password"
                            class="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                        />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="response">
                        <p class="login-response" id="status"></p>
                    </div>
                    <div class="input-field button">
                        <input type="button" id="login-btn" value="Login Now" />
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

                <form action="#" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your first name" id="first_name" required />
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your last name" id="last_name" required />
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" id="user_email" required />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input
                            type="password"
                            class="password"
                            id="user_password"
                            placeholder="Create a password"
                            required
                        />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="login-response" id="sign_status"></div>

                    <div class="input-field button">
                        <input type="button" value="Login Now" id="signup_button"/>
                    </div>
                </form>

                <div class="login-signup">
                      <span class="text">You're a member?
                        <a href="#" class="text login-link">Login Now</a>
                      </span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="./frontend/assets/js/login.js"></script>
</body>
</html>
