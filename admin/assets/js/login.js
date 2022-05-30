const pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password");

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

//login via axios
let login_button = document.getElementById("admin-login");
login_button.addEventListener("click", function(event){
    event.preventDefault();
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    let data = new FormData();
    data.append('email', email);
    data.append('password', password);

    let url = 'http://groupproject/backend/api/admin_login.php';

    axios({
        method: 'POST',
        url: url,
        data: data
    })
        .then(function (response) {
            if(response.data['status']) {
                console.log(response);
                localStorage.setItem('user_id', response.data['user_id']);
                window.location.href = "http://groupproject/admin/pages/dashboard.php";
            } else {
                let status = document.getElementById('status');
                status.innerHTML = response.data['message'];
            }
        });

});