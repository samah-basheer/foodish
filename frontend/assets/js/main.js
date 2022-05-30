// menu
const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");
menuBtn.onclick = () => {
    navbar.classList.add("show");
    menuBtn.classList.add("hide");
    body.classList.add("disabled");
};
cancelBtn.onclick = () => {
    body.classList.remove("disabled");
    navbar.classList.remove("show");
    menuBtn.classList.remove("hide");
};
window.onscroll = () => {
    this.scrollY > 20
        ? navbar.classList.add("sticky")
        : navbar.classList.remove("sticky");
};

function userVerification() {
    let user_id = localStorage.getItem('user_id');
    if(user_id === null) {
        window.location.replace("http://groupproject/");
    }
}
userVerification();

let logout_button = document.getElementById("logout");
logout_button.addEventListener("click", function(event) {
    event.preventDefault();
    localStorage.removeItem("user_id");
    window.location.replace("http://groupproject/");
});
