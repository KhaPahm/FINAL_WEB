

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
