const body = document.querySelector("body");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})

setActivePath=function() {
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('.menu-items li a');
    const menuLength = menuItem.length;

    for (let i = 0; i < menuLength; i++) {
        if(menuItem[i].href === currentLocation) {
            menuItem[i].closest('li').className = 'active';
        }
    }
};
setActivePath();

function userVerification() {
    let user_id = localStorage.getItem('user_id');
    if(user_id === null) {
        window.location.replace("http://groupproject/admin/pages/login.php");
    }
}
userVerification();

let logout_button = document.getElementById("logout");
logout_button.addEventListener("click", function(event) {
    event.preventDefault();
    localStorage.removeItem("user_id");
    window.location.replace("http://groupproject/admin/pages/login.php");
});