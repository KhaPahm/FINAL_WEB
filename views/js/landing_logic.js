


const aboutSwiper = new Swiper(".aboutSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    freeMode: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: 'bullets',
    },
    breakpoints: {
        599: {
            slidesPerView: 2,
            spaceBetween: 50
        },

    }
});




$(document).ready(() => {
    $.ajax({
        url: 'http://localhost/final_web/api/user_api.php?logged_in',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            console.log(data);
            if (status) {
                $('.none_login').hide();
            } else {
                $('.loggedin').hide();
            }
        }
    }),
        $.ajax({
            method: 'GET',
            url: 'http://localhost/final_web/api/airport_api.php?airports',
            success: (data) => {
                let status = JSON.parse(data).status;
                if (status) {
                    let datas = JSON.parse(data).data;
                    let html = "<option value='none'>SELECT</option>"

                    datas.forEach(element => {
                        html += "<option value='" + element.airport_id + "'>" + element.address + "-" + element.name + " (" + element.code + ")</option>";
                    });


                    $('#takeoff_airport').html(html);
                    $('#landing_airport').html(html);
                    // $('#ip_end').html('<option value="">Destination</option>' + html);
                }
            }
        })
})

$('#log_out').click(() => {
    $.ajax({
        url: 'http://localhost/final_web/api/user_api.php?log_out',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            console.log(data);
            if (status) {
                alert('You are log out! Thank you and see you again!');
                $('.loggedin').hide();
                $('.none_login').show();
            }
        }
    })
})



const menu = document.querySelector(".menu");
const menuBtn = document.querySelector(".menu-btn");

menuBtn.addEventListener("click", () => {
    menu.classList.toggle('nav-toggle');
});


// document.querySelector(".year").innerHTML = new Date().getFullYear;

function currentDate() {
    let t = new Date();
    date = t.getFullYear() + "-" + (t.getMonth() + 1) + "-" + t.getDate();
    console.log(date);
    $('#start_day').attr('min', date);
    $('#start_day_re').attr('min', date);
    $('#re_day').attr('min', date);

}

currentDate();


$('#search-one').click(() => {
    let takeoff = $('#takeoff_airport').val();
    let landing = $('#landing_airport').val();
    let daystart = $('#start_day').val();
    let path = "http://localhost/final_web/flights.php?takeoff_airport=" + takeoff + "&landing_airport=" + landing + "&takeoff_day=" + daystart;
    window.location.replace(path);
})

