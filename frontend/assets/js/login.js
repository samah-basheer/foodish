const container = document.querySelector(".container"),
    pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password"),
    signUp = document.querySelector(".signup-link"),
    login = document.querySelector(".login-link");

//   js code to show/hide password and change icon
pwShowHide.forEach((eyeIcon) => {
    eyeIcon.addEventListener("click", () => {
        pwFields.forEach((pwField) => {
            if (pwField.type === "password") {
                pwField.type = "text";

                pwShowHide.forEach((icon) => {
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                });
            } else {
                pwField.type = "password";

                pwShowHide.forEach((icon) => {
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                });
            }
        });
    });
});

// js code to appear signup and login form
signUp.addEventListener("click", () => {
    container.classList.add("active");
});
login.addEventListener("click", () => {
    container.classList.remove("active");
});

//login via axios
let login_button = document.getElementById("login-btn");
if(login_button) {
    login_button.addEventListener("click", function(event){
        event.preventDefault();
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        let data = new FormData();
        data.append('email', email);
        data.append('password', password);

        let url = 'http://groupproject/backend/api/user_login.php';

        axios({
            method: 'POST',
            url: url,
            data: data
        })
            .then(function (response) {
                let status = document.getElementById('status');
                if(response.data['status']) {
                    localStorage.setItem('user_id', response.data['user_id']);
                    window.location.href = "http://groupproject/frontend/pages/home.php";
                } else {
                    status.innerHTML = response.data['message'];
                }
            });

    });
}

//Sign up via axios
let signup_button = document.getElementById("signup_button");
if(signup_button) {
    signup_button.addEventListener("click", function(event){
        event.preventDefault();
        let first_name = document.getElementById("first_name").value;
        let last_name = document.getElementById("last_name").value;
        let email = document.getElementById("user_email").value;
        let password = document.getElementById("user_password").value;

        let data = new FormData();
        data.append('first_name', first_name);
        data.append('last_name', last_name);
        data.append('email', email);
        data.append('password', password);

        let url = 'http://groupproject/backend/api/add_users.php';

        axios({
            method: 'POST',
            url: url,
            data: data
        })
            .then(function (response) {
                let status = document.getElementById('sign_status');
                if(response.data['status']) {
                    localStorage.setItem('user_id', response.data['id']);
                    window.location.href = "http://groupproject/frontend/pages/home.php";
                } else {
                    status.innerHTML = response.data['message'];
                }
            });

    });
}