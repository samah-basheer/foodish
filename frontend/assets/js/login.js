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
login_button.addEventListener("click", function(event){
    event.preventDefault();
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

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