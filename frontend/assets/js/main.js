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

let submit_review = document.getElementById("submit_review");
submit_review.addEventListener("click", function(event) {
    event.preventDefault();
    const user_id = localStorage.getItem("user_id");
    const restaurant_id = document.getElementById("restaurant_id").value;
    let review = document.getElementById("review").value;
    let stars;

    let rating = document.querySelectorAll(".stars");
    rating.forEach(el => {
        if(el.checked == true) {
            stars = el.value;
        }
    })
    let data = new FormData();
    data.append('user_id', user_id);
    data.append('restaurant_id', restaurant_id);
    data.append('review', review);
    data.append('rating', stars);

    let url = 'http://groupproject/backend/api/add_reviews.php';

    axios({
        method: 'POST',
        url: url,
        data: data
    })
        .then(function (response) {
            if(response.data['status']) {
                location.reload();
            } else {
                let status = document.getElementById('status');
                status.innerHTML = response.data['message'];
            }
        });
});