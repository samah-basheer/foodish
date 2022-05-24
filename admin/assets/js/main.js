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

let menu_ul = document.querySelector('.menu-items ul');
let menu_li = document.querySelectorAll('.menu-items ul li');

menu_li.forEach( el => {
    el.addEventListener('click', function () {
        menu_ul.querySelector('.active').classList.remove('active');
        el.classList.add('active');
    });
});
