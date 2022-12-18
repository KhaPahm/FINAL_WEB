function show(a) {
    var div = document.getElementById(a);
    if (div.style.display == "none") {
        div.style.display = "block";
    }
    else {
        div.style.display = "none";
    }
}
function shows(a) {
    var div = document.getElementById(a);
    if (div.style.display == "none") {
        div.style.display = "block";
    }
    else {
        div.style.display = "none";
    }
}

var fly = document.getElementById('flyy');
var use = document.getElementById('usee');

function flyy() {
    // selected=document.getElementsByClassName("selecte");
    // selected
    fly.style.display = "block";
    use.style.display = "none";

    selected = document.getElementById("t1");
    notselected = document.getElementById("t2");
    selected.style.backgroundColor = "#256eaa";

    notselected.style.backgroundColor = "#00ac9d";
}

function usee() {
    // selected=document.getElementsByClassName("selecte");
    // selected
    fly.style.display = "none";
    use.style.display = "block";

    selected = document.getElementById("t1");
    notselected = document.getElementById("t2");
    selected.style.backgroundColor = "#00ac9d";

    notselected.style.backgroundColor = "#256eaa";


}



$("#logout_admin").click(() => {
    console.log('AAAA')
    $.ajax({
        url: 'http://localhost/final_web/api/user_api.php?log_out',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            // console.log(data);
            if (status) {
                alert('You are log out! Thank you and see you again!');
                window.location.replace('login.php');
            }
        }
    })
})



$('#addfl').click(function () {
    if (checknull()) {
        let t1 = $('#ip_go').val() + " " + $('#ip_time_go').val();
        let t2 = $('#ip_end_date').val() + " " + $('#ip_time_end').val();

        let dateStart = new Date(t1);
        let dateEnd = new Date(t2);
        console.log(t2);
        if ($('#ip_from').val() == $('#ip_end').val()) {
            alert('Take off airport have to difference with landing airport!');
            $('#ip_from').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
            $('#ip_end').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
            return;
        }
        else if (dateEnd < dateStart) {
            alert('Landing date have to after take off date. Please enter again!')
            $('#ip_from').css({ 'border-color': '', 'border-width': '', 'border-style': '' });
            $('#ip_end').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

            $('#ip_go').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
            $('#ip_time_go').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });

            $('#ip_end_date').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
            $('#ip_time_end').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
        }
        else {
            $.ajax({
                url: 'http://localhost/final_web/api/flight_api.php',
                method: 'POST',
                data: $('#add_fight_form').serialize(),
                success: (data) => {
                    let status = JSON.parse(data).status;
                    if (status) {
                        alert("Add flight done!");
                        window.location.reload();
                    }
                }
            })
        }

    }

})

function checknull() {
    if ($('#ip_from').val() == "") {
        $('#ip_from').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
    } else {
        $('#ip_from').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

    }
    if ($('#ip_go').val() == "") {
        $('#ip_go').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
    } else {
        $('#ip_go').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

    }
    if ($('#ip_time_go').val() == "") {
        $('#ip_time_go').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
    } else {
        $('#ip_time_go').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

    }
    if ($('#ip_price').val() == "") {
        $('#ip_price').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
    } else {
        $('#ip_price').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

    }
    if ($('#ip_end').val() == "") {
        $('#ip_end').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
    } else {
        $('#ip_end').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

    }
    if ($('#ip_end_date').val() == "") {
        $('#ip_end_date').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
    } else {
        $('#ip_end_date').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

    }
    if ($('#ip_time_end').val() == "") {
        $('#ip_time_end').css({ 'border-color': 'red', 'border-width': '1px', 'border-style': 'solid' });
    } else {
        $('#ip_time_end').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

    }
    if ($('#ip_plane').val() == "") {
        $('#ip_plane').css({ 'border -color': 'red', 'border-width': '1px', 'border-style': 'solid' });
    } else {
        $('#ip_plane').css({ 'border-color': '', 'border-width': '', 'border-style': '' });

    }
    if ($('#ip_from').val() == "" || $('#ip_go').val() == "" || $('#ip_time_go').val() == "" || $('#ip_price').val() == "" || $('#ip_end').val() == "" || $('#ip_end_date').val() == "" || $('#ip_time_end').val() == "" || $('#ip_plane').val() == "") {
        alert("Please fill all information in form before submit!");
        return false;
    }

    return true;
}


$(document).ready(function () {
    $.ajax({
        method: 'GET',
        url: 'http://localhost/final_web/api/airport_api.php?airports',
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                let datas = JSON.parse(data).data;
                let html = ""

                datas.forEach(element => {
                    html += "<option value='" + element.airport_id + "'>" + element.name + " (" + element.code + ") </option>"
                });


                $('#ip_from').html('<option value="">From</option>' + html);
                $('#ip_end').html('<option value="">Destination</option>' + html);
            }
        }
    }),
        $.ajax({
            method: 'GET',
            url: 'http://localhost/final_web/api/plane_api.php?planes',
            success: (data) => {
                let status = JSON.parse(data).status;
                if (status) {
                    let datas = JSON.parse(data).data;
                    let html = ""

                    datas.forEach(element => {
                        html += "<option value='" + element.plane_id + "'>" + element.name + " (" + element.No + ") </option>"
                    });


                    $('#ip_plane').html('<option value="">Plane</option>' + html);
                }
            }
        })
})

function currentDate() {
    let t = new Date();
    date = t.getFullYear() + "-" + (t.getMonth() + 1) + "-" + t.getDate();
    $('#ip_go').attr('min', date);
    $('#ip_end_date').attr('min', date);

}

currentDate();


$('.edit_flight').click(function () {
    let id = $(this).attr('data-id');
    $('#id_flight_change').html("Flight ID: " + id);
    $('#upload_flight_id').val(id)
})

$('.delete').click(function () {
    alert('It is unavailable. Flight will be delete by system after it done! If you want to be delete it now, you have to delete it in database!')
})

$('#save_new_price').click(function () {
    let id = $('#upload_flight_id').val();
    let newPrice = $('#ip_new_price').val();
    console.log('AAAA');
    $.ajax({
        url: 'http://localhost/final_web/api/flight_api.php',
        method: 'POST',
        data: $('#update_price').serialize(),
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                alert('You will upload price of flight: ' + id + " to: " + newPrice);
                window.location.reload();
            }
            else {
                alert('Somethign wrong! Contact to dev and tell them about erro!');
            }
        }
    })
})


$('#t2').click(() => {
    $.ajax({
        url: 'http://localhost/final_web/api/user_api.php?users',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                let datas = JSON.parse(data).data;
                let html = ""
                datas.forEach(e => {
                    html += '<tr>' +
                        '<td>' + e.email + '</td>' +
                        '<td>' +
                        '<div class="client">' +
                        ' <h5>' + e.firstname + ' ' + e.lastname + '</h5>' +
                        ' </div>' +
                        '</td>' +
                        '<td>' +
                        '<h5>' + e.nationality + '</h5>' +
                        '</td>' +
                        '<td>' +
                        e.phone +
                        '</td>' +
                        '<td>' +
                        e.point +
                        ' </td>' +
                        ' <td>' +
                        e.level +
                        '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<span>' +
                        '<i data-id=' + e.customer_id + ' class="gg-eye-alt history-user" data-toggle="modal" data-target="#historyModal"></i>' +

                        '</span>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                })

                $('#table_user').html(html);
            }
        }
    })
})


$(document).on('click', '.history-user', function () {
    console.log($(this).attr('data-id'));
    $.ajax({
        url: 'http://localhost/final_web/api/user_api.php',
        method: 'POST',
        data: {
            user_infor: $(this).attr('data-id')
        },
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                let datas = JSON.parse(data).data;
                let user_history = datas.firstname + " " + datas.lastname + " - " + datas.nationality;
                let user_history2 = datas.email + " - " + datas.phone;
                $('#user_history').html(user_history);
                $('#user_history2').html(user_history2);
            }
        }
    })
    $.ajax({
        url: 'http://localhost/final_web/api/ticket_api.php',
        method: 'POST',
        data: {
            tickets_user_id: $(this).attr('data-id')
        }, success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                let t = JSON.parse(data);
                let datas = JSON.parse(data).data;
                let count = Object.keys(t).length
                let html = "";
                datas.forEach(e => {
                    html += '<tr>' +
                        '<th scope="row">' + e.ticket_id + '</th>' +
                        '<td>' + e.takeoff + '</td>' +
                        '<td>' + e.ladning + '</td>' +
                        '<td>' + e.takeoffdate + '</td>' +
                        '<td>' + e.seat + '</td>' +
                        '<td>' + e.price + ' VND</td>' +
                        '</tr>';
                })

                $('#table_history').html(html);
            }
        }
    })

})