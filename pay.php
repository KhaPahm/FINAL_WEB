<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AVRwyUCI2S9j7aPkdN8mnyUjlldDdU2FCiai_PYpGpJBnGz_s9zGnuhVeY-CU5Xx9LvN8gUg5VKTGP_a&currency=USD">
    </script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
    paypal.Buttons({
        style: {
            layout: 'vertical',
            color: 'blue',
            shape: 'rect',
            label: 'paypal'
        },
        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
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
                        value: '100.0'
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
            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert(`Transaction` + transaction.status + ': ' + transaction.id +
                    `\n\nSee console for all available details`);
            });
        },

    }).render('#paypal-button-container');
    </script>
</body>

</html>