


$(document).ready(() => {
    $.ajax({
        url: 'http://localhost/final_web/api/user_api.php?customer_infor',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                let datas = JSON.parse(data).data;
                $('#fname').val(datas.firstname);
                $('#lname').val(datas.lastname);
                $('#phone').val(datas.phone);
                $('#nationality').val(datas.nationality);
                $('#email').val(datas.email);
            }
        }

    })
})

$('#paypal-button-container').hide();
$('#sumPrice').hide();
let price;
$('#s1').click(() => {
    $('#paypal-button-container').show();
    $('#sumPriceVal').html($('#basic_price').attr('price_number'));
    $('#price').val($('#basic_price').attr('price_number') * 4)
    $('#tongtien').val(Math.floor($('#basic_price').attr('price_number') / 23000, 2));
    $('#sumPrice').show();

})

$('#s2').click(() => {
    $('#paypal-button-container').show();
    $('#sumPriceVal').html($('#basic_price').attr('price_number') * 2);
    $('#price').val($('#basic_price').attr('price_number') * 4)
    $('#tongtien').val(Math.floor($('#basic_price').attr('price_number') * 2 / 23000, 2));
    $('#sumPrice').show();
})

$('#s3').click(() => {
    $('#paypal-button-container').show();
    $('#sumPriceVal').html($('#basic_price').attr('price_number') * 4);
    $('#price').val($('#basic_price').attr('price_number') * 4)
    $('#tongtien').val(Math.floor($('#basic_price').attr('price_number') * 4 / 23000, 2));
    $('#sumPrice').show();
})



paypal.Buttons({
    style: {
        layout: 'vertical',
        color: 'blue',
        shape: 'rect',
        label: 'paypal'
    },
    // Order is created on the server and the order id is returned
    createOrder: (data, actions) => {
        let sumPrice = $('#tongtien').val();

        // return fetch("/api/orders", {
        //         method: "post",
        //         // use the "body" param to optionally pass additional order information
        //         // like product ids or amount
        //     })
        //     .then((response) => response.json())
        //     .then((order) => order.id);
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: sumPrice,
                }
            }]
        })
    },
    // Finalize the transaction on the server after payer approval
    onApprove: (data, actions) => {
        // return fetch(`/api/orders/${data.orderID}/capture`, {
        //         method: "post",
        //     })
        //     .then((response) => response.json())
        //     .then((orderData) => {
        //         // Successful capture! For dev/demo purposes:
        //         console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        //         const transaction = orderData.purchase_units[0].payments.captures[0];
        //         alert(
        //             `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
        //         );
        //         // When ready to go live, remove the alert and show a success message within this page. For example:
        //         // const element = document.getElementById('paypal-button-container');
        //         // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        //         // Or go to another URL:  actions.redirect('thank_you.html');
        //     });
        return actions.order.capture().then(function (orderData) {
            console.log('Capture result', orderData, JSON.stringify(
                orderData, null, 2));
            var transaction = orderData.purchase_units[0].payments
                .captures[0];
            alert(`Transaction` + transaction.status + ': ' +
                transaction.id +
                `\n\nSee console for all available details`);
            booking();
        });
    },

}).render('#paypal-button-container');

function booking() {
    const radioButtons = document.querySelectorAll('input[name="typeofseat"]');
    let selectedSize;
    for (const radioButton of radioButtons) {
        if (radioButton.checked) {
            selectedSize = radioButton.value;
            break;
        }
    }

    console.log(selectedSize);
    $.ajax({
        url: 'http://localhost/final_web/api/ticket_api.php',
        method: 'POST',
        data: {
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            nationality: $('#nationality').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            flight_id: $('#flight_id').val(),
            price: $('#price').val(),
            typeofseat: selectedSize,
        },
        success: (data) => {
            console.log(data);
            let status = JSON.parse(data).status;
            if (status) {
                let ticket_id = JSON.parse(data).ticket_id;

                console.log($('#booking_form').serialize());
                alert("You was booked ticket! Your ticket code is: <b>" + ticket_id + "</b>. See detail in your email or check in home page!");
                window.location.replace('index.php')
            }
        }
    })
}

$('#booked').click(() => {
    console.log($('#fname').val());
    console.log($('#lname').val());
    console.log($('#nationality').val());
    console.log($('#email').val());
    console.log($('#phone').val());
    console.log($('#flight_id').val());
    console.log($('#price').val());
    const radioButtons = document.querySelectorAll('input[name="typeofseat"]');
    let selectedSize;
    for (const radioButton of radioButtons) {
        if (radioButton.checked) {
            selectedSize = radioButton.value;
            break;
        }
    }

    console.log(selectedSize);
    $.ajax({
        url: 'http://localhost/final_web/api/ticket_api.php',
        method: 'POST',
        data: {
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            nationality: $('#nationality').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            flight_id: $('#flight_id').val(),
            price: $('#price').val(),
            typeofseat: selectedSize,
        },
        success: (data) => {
            console.log(data);
            let status = JSON.parse(data).status;
            if (status) {
                console.log($('#booking_form').serialize());
                alert("You will be booked ticket! See more detail in your mail!");
            }
        }
    })
})