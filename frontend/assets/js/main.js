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
if(logout_button) {
    logout_button.addEventListener("click", function(event) {
        event.preventDefault();
        localStorage.removeItem("user_id");
        window.location.replace("http://groupproject/");
    });
}

// submit review
let submit_review = document.getElementById("submit_review");
if(submit_review) {
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
}

// update user profile
let user_profile_btn = document.getElementById("user_profile_btn");
if(user_profile_btn) {
    user_profile_btn.addEventListener("click", function(event) {
        event.preventDefault();
        const user_id = localStorage.getItem("user_id");
        let fname = document.getElementById("fname").value;
        let lname = document.getElementById("lname").value;

        let data = new FormData();
        data.append('id', user_id);
        data.append('first_name', fname);
        data.append('last_name', lname);

        let url = 'http://groupproject/backend/api/update_user.php';

        axios({
            method: 'POST',
            url: url,
            data: data
        })
            .then(function (response) {
                if(response.data['status']) {
                    location.reload();
                } else {
                    let status_update_profile = document.getElementById('status_update_profile');
                    status_update_profile.innerHTML = response.data['message'];
                }
            });
    });
}