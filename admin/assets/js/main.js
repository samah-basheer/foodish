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
//
// let data = new FormData();
// data.append('id', 1);
// axios({
//     method: 'post',
//     url: 'http://groupproject/backend/api/get_restaurants.php',
//     data: data,
// })
//     .then(function (response) {
//         console.log(response);
//     }
// )

const URL = 'http://groupproject/backend/api/get_restaurants.php';
const rest_container = document.getElementById('restaurants');
var html = '';
var myJSON = '';

//
// axios.get(URL).then(
//     response => myJSON = JSON.stringify(response.data)
// );


function getRestaurants() {
    axios.get(URL).then(function (result) {
        printRestaurants(result.data);
    });
}

function printRestaurants(data) {
    let html = '<div class="row">';
    let i = 0;
    console.log(data);
    data.forEach(el =>
        i % 2 ? html += '</div><div class="row"' : //do nothing
        html += '<div class="col-md-6 mb-1">\n' +
            '                <div class="restaurant d-flex">\n' +
            '                    <div>\n' +
            '                        <img src="../../assets/images/'+el.pic_url+'">\n' +
            '                    </div>\n' +
            '                    <div class="pl-1 w-100">\n' +
            '                        <div class="d-flex justify-space-between align-items">\n' +
            '                            <h3>'+ el.name +'</h3>\n' +
            '                            <div>\n' +
            '                                <i class="fa fa-pencil-square-o edit-icon" aria-hidden="true"></i>\n' +
            '                                <i class="fa fa-trash-o trash-icon" aria-hidden="true"></i>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                        <p>' + el.description + '</p>\n' +
            '                        <div class="text-right">\n' +
            '                            <span class="status">open now</span>\n' +
            '                            <span>|</span>\n' +
            '                            <span class="reviews">4.5 <i class="fa fa-star" aria-hidden="true"></i></span>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>'
    );
    rest_container.innerHTML = html;
}
getRestaurants();