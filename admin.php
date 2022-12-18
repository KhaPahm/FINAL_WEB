<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="./views/css/admin.css">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://css.gg/css' rel='stylesheet'>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
    $.ajax({
        url: 'http://localhost/final_web/api/user_api.php?logged_in_admin',
        method: 'GET',
        success: (data) => {
            let status = JSON.parse(data).status;
            // console.log(data);
            if (!status) {
                window.location.replace('index.php');
            }
        }
    })
    </script>

</head>

<?php require_once('./database/database.php'); ?>

<body>

    <header>
        <div class="header-content">
            <div class="logo">
                <img src="./views/images/Logo.png" alt="">
            </div>

            <div class="search">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class="las la-search"></i></label>
            </div>

            <div class="header-menu">

                <div class="notify-icon">
                    <span class="las la-envelope"></span>
                    <span class="notify">4</span>
                </div>

                <div class="notify-icon">
                    <span class="las la-bell"></span>
                    <span class="notify">3</span>
                </div>

                <div class="user" id="user">
                    <span class="las la-power-off"></span>
                    <span id="logout_admin">Logout</span>
                </div>
            </div>
        </div>

    </header>


    <section>
        <div class="container">
            <div class="sidebar">

                <div class="side-content">
                    <div class="profile">
                        <div class="profile-img bg-img"
                            style="background-image: url(./views/images/Logo2-removebg-preview.png)"></div>
                        <h4>AirTech</h4>
                    </div>

                    <div class="side-menu">
                        <ul>
                            <li class="select" onclick="flyy()" id="t1">

                                <span><i class="gg-airplane"></i></span>
                                <small>Flights</small>

                            </li>
                            <li onclick="usee()" class="" id="t2">

                                <span><i class="fa-solid fa-users"></i></span>
                                <small>Users</small>

                            </li>



                        </ul>
                    </div>
                </div>
            </div>


            <div class="page-content" id="flyy">

                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <?php
                            $query = "select * from flight";
                            $countFlight = $conn->query($query);

                            echo "<h2>" . $countFlight->num_rows . "</h2>";
                            ?>
                            <i class="fa-solid fa-plane-circle-check" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-progress">
                            <small>Flights</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-head">
                            <?php
                            $query2 = "select sum(price) as sum from ticket";
                            $sumPrice = $conn->query($query2);
                            while ($row = $sumPrice->fetch_assoc()) {
                                echo "<h2>" . number_format($row['sum'], 0, '', ',') . "</h2>";
                            }
                            ?>
                            <i class="fa-solid fa-dollar-sign" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-progress">
                            <small>Revenue</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 95%"></div>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <select name="" id="">
                                <option value="">ID</option>
                            </select>
                            <button onclick="show(' toshow')" id="add_flight">Add record</button>
                        </div>

                        <div class="browse">
                            <input type="search" placeholder="Search" class="record-search">
                        </div>
                    </div>

                    <!-- Div to add flightsssssssssssssssssssss -->
                    <div class="addformr" style="display: none;" id="toshow">
                        <form onsubmit="return false;" id="add_fight_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control form-control-md" name="takeoff_airport" id="ip_from">
                                        <option value="">From</option>
                                    </select>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="takeoffday" id="ip_go"
                                                placeholder="Time whrn flying">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="time" name="takeofftime" id="ip_time_go"
                                                placeholder="Time whrn flying">
                                        </div>
                                    </div>
                                    <br>
                                    <input class="form-control" type="text" name="basicprice" id="ip_price"
                                        placeholder="Basic price">
                                    <br>
                                    <input class="form-control" type="text" name="notes" id="ip_notes"
                                        placeholder="Notes">



                                </div>
                                <div class="col-md-6"
                                    style="display: flex; flex-direction: column; margin-bottom: 1em;">

                                    <select class="form-control form-control-md" name="landing_airport" id="ip_end">
                                        <option value="">Destination</option>
                                    </select><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="landingdate" id="ip_end_date"
                                                placeholder="Time whrn flying" min="today()">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="time" name="landingtime" id="ip_time_end"
                                                placeholder="Time whrn flying">
                                        </div>
                                    </div>
                                    <br>
                                    <select class="form-control form-control-md" name="plane_id" id="ip_plane">
                                        <option value="">Plane</option>
                                    </select>
                                    <input type="submit" name="" id="addfl" value="ADD"
                                        style="background-color: #00ac9d; padding: 0.4em 0.6em; border-radius: 0.4em; margin-top: 1em;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span></span><i class="fa-solid fa-plane-departure"></i> &nbsp; FROM </th>
                                    <th><span></span> <i class="fa-solid fa-plane-arrival"></i> &nbsp; DESTINATION</th>
                                    <th><span></span> <i class="fa-solid fa-calendar-days"></i> &nbsp; DATE</th>
                                    <th><span></span> <i class="fa-solid fa-coins"></i> &nbsp; BASIC PRICE</th>
                                    <th><span></span> VIEWS DETAIL </th>
                                    <th><span></span> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "select distinct f.flight_id, f.takeofftime, f.takeoffday, f.landingtime, f.landingdate, f.basicprice, concat(a.name, ' (', a.code, ')') as takeoff, concat(a1.name, ' (', a1.code, ')') as landing, p.name as planename, p.no as planeno
                                        from (((select flight_id, takeofftime, takeoffday, landingtime, landingdate, basicprice, plane_id, takeoff_airport, landing_airport from flight) f 
                                        join (select airport_id, name, code from airport) a on f.takeoff_airport = a.airport_id) 
                                        join (select airport_id, name, code from airport) a1 on f.landing_airport = a1.airport_id) 
                                        join (select plane_id, name, no from plane) p on p.plane_id = f.plane_id
                                        order by f.takeoffday, f.takeofftime asc;";
                                $result = $conn->query($query);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row['flight_id'] . "</td>
                                        <td>
                                            " . $row['takeoff'] . "
                                        </td>
                                        <td>
                                            " . $row['landing'] . "
                                        </td>
                                        <td>
                                            " . $row['takeoffday'] . " " . $row['takeofftime'] . "
                                        </td>
                                        <td>
                                        " . number_format($row['basicprice'], 0, '', ',') . " VND
                                        </td>
                                        <td>
                                            <div class='actions'>
                                                <span>
                                                    <i class='gg-eye-alt'></i>
    
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='actions'>
                                                <span class='lab la-telegram-plane edit_flight' data-id ='" . $row['flight_id'] . "' data-toggle='modal' data-target='#exampleModal'></span>
                                                <span class='las la-trash delete' id='" . $row['flight_id'] . "'></span>
                                            </div>
    
                                        </td>
    
                                    </tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>




                </div>

            </div>

            <div class="page-content" id="usee">

                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <?php
                            $query4 = "select * from customer";
                            $countUser = $conn->query($query4);

                            echo "<h2>" . $countUser->num_rows . "</h2>";
                            ?>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>User</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="browse">
                            <input type="search" placeholder="Search" class="record-search">
                        </div>

                    </div>


                    <div class="data">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th><span></span> NAME</th>
                                    <th><span></span> NATIONALITY</th>
                                    <th><span></span> PHONE</th>
                                    <th><span></span> POINT</th>
                                    <th><span></span> RANK </th>
                                    <th><span></span> HISTORY</th>
                                </tr>
                            </thead>
                            <tbody id="table_user">



                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form onsubmit="return false;" id='update_price'>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">UPDATE FLIGHT'S PRICE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 id="id_flight_change">Flight ID: 1234</h5>
                            <br>

                            <input class="form-control" type="number" name="upload_flight_id" id="upload_flight_id"
                                hidden>
                            <input class="form-control" type="number" name="new_price" id="ip_new_price"
                                placeholder="New price">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="save_new_price">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="modal fade bd-example-modal-lg" id="historyModal" tabindex="-1" role="dialog"
            aria-labelledby="historyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="historyModalLabel">User's booking history</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 id="user_history">Pham Hoang Kha</h6>
                        <h6 id="user_history2">Pham Hoang Kha</h6>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">FROM</th>
                                    <th scope="col">TO</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">SEAT</th>
                                    <th scope="col">PRICE</th>
                                </tr>
                            </thead>
                            <tbody id="table_history">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save_new_price">Save changes</button>
                    </div>
                </div>
                s
            </div>
        </div>
    </section>

    <script src="./views/js/admin.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->

</body>

<script>
function show(a) {
    var div = document.getElementById(a);
    if (div.style.display == "none") {
        div.style.display = "block";
    } else {
        div.style.display = "none";
    }
}

function shows(a) {
    var div = document.getElementById(a);
    if (div.style.display == "none") {
        div.style.display = "block";
    } else {
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



$('#addfl').click(function() {
    if (checknull()) {
        let t1 = $('#ip_go').val() + " " + $('#ip_time_go').val();
        let t2 = $('#ip_end_date').val() + " " + $('#ip_time_end').val();

        let dateStart = new Date(t1);
        let dateEnd = new Date(t2);
        console.log(t2);
        if ($('#ip_from').val() == $('#ip_end').val()) {
            alert('Take off airport have to difference with landing airport!');
            $('#ip_from').css({
                'border-color': 'red',
                'border-width': '1px',
                'border-style': 'solid'
            });
            $('#ip_end').css({
                'border-color': 'red',
                'border-width': '1px',
                'border-style': 'solid'
            });
            return;
        } else if (dateEnd < dateStart) {
            alert('Landing date have to after take off date. Please enter again!')
            $('#ip_from').css({
                'border-color': '',
                'border-width': '',
                'border-style': ''
            });
            $('#ip_end').css({
                'border-color': '',
                'border-width': '',
                'border-style': ''
            });

            $('#ip_go').css({
                'border-color': 'red',
                'border-width': '1px',
                'border-style': 'solid'
            });
            $('#ip_time_go').css({
                'border-color': 'red',
                'border-width': '1px',
                'border-style': 'solid'
            });

            $('#ip_end_date').css({
                'border-color': 'red',
                'border-width': '1px',
                'border-style': 'solid'
            });
            $('#ip_time_end').css({
                'border-color': 'red',
                'border-width': '1px',
                'border-style': 'solid'
            });
        } else {
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
        $('#ip_from').css({
            'border-color': 'red',
            'border-width': '1px',
            'border-style': 'solid'
        });
    } else {
        $('#ip_from').css({
            'border-color': '',
            'border-width': '',
            'border-style': ''
        });

    }
    if ($('#ip_go').val() == "") {
        $('#ip_go').css({
            'border-color': 'red',
            'border-width': '1px',
            'border-style': 'solid'
        });
    } else {
        $('#ip_go').css({
            'border-color': '',
            'border-width': '',
            'border-style': ''
        });

    }
    if ($('#ip_time_go').val() == "") {
        $('#ip_time_go').css({
            'border-color': 'red',
            'border-width': '1px',
            'border-style': 'solid'
        });
    } else {
        $('#ip_time_go').css({
            'border-color': '',
            'border-width': '',
            'border-style': ''
        });

    }
    if ($('#ip_price').val() == "") {
        $('#ip_price').css({
            'border-color': 'red',
            'border-width': '1px',
            'border-style': 'solid'
        });
    } else {
        $('#ip_price').css({
            'border-color': '',
            'border-width': '',
            'border-style': ''
        });

    }
    if ($('#ip_end').val() == "") {
        $('#ip_end').css({
            'border-color': 'red',
            'border-width': '1px',
            'border-style': 'solid'
        });
    } else {
        $('#ip_end').css({
            'border-color': '',
            'border-width': '',
            'border-style': ''
        });

    }
    if ($('#ip_end_date').val() == "") {
        $('#ip_end_date').css({
            'border-color': 'red',
            'border-width': '1px',
            'border-style': 'solid'
        });
    } else {
        $('#ip_end_date').css({
            'border-color': '',
            'border-width': '',
            'border-style': ''
        });

    }
    if ($('#ip_time_end').val() == "") {
        $('#ip_time_end').css({
            'border-color': 'red',
            'border-width': '1px',
            'border-style': 'solid'
        });
    } else {
        $('#ip_time_end').css({
            'border-color': '',
            'border-width': '',
            'border-style': ''
        });

    }
    if ($('#ip_plane').val() == "") {
        $('#ip_plane').css({
            'border -color': 'red',
            'border-width': '1px',
            'border-style': 'solid'
        });
    } else {
        $('#ip_plane').css({
            'border-color': '',
            'border-width': '',
            'border-style': ''
        });

    }
    if ($('#ip_from').val() == "" || $('#ip_go').val() == "" || $('#ip_time_go').val() == "" || $('#ip_price').val() ==
        "" || $('#ip_end').val() == "" || $('#ip_end_date').val() == "" || $('#ip_time_end').val() == "" || $(
            '#ip_plane').val() == "") {
        alert("Please fill all information in form before submit!");
        return false;
    }

    return true;
}


$(document).ready(function() {
    $.ajax({
            method: 'GET',
            url: 'http://localhost/final_web/api/airport_api.php?airports',
            success: (data) => {
                let status = JSON.parse(data).status;
                if (status) {
                    let datas = JSON.parse(data).data;
                    let html = ""

                    datas.forEach(element => {
                        html += "<option value='" + element.airport_id + "'>" + element.name +
                            " (" + element.code + ") </option>"
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
                        html += "<option value='" + element.plane_id + "'>" + element.name +
                            " (" + element.No + ") </option>"
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


$('.edit_flight').click(function() {
    let id = $(this).attr('data-id');
    $('#id_flight_change').html("Flight ID: " + id);
    $('#upload_flight_id').val(id)
})

$('.delete').click(function() {
    alert(
        'It is unavailable. Flight will be delete by system after it done! If you want to be delete it now, you have to delete it in database!'
    )
})

$('#save_new_price').click(function() {
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
            } else {
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
                        '<i data-id=' + e.customer_id +
                        ' class="gg-eye-alt history-user" data-toggle="modal" data-target="#historyModal"></i>' +

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


$(document).on('click', '.history-user', function() {
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
                let user_history = datas.firstname + " " + datas.lastname + " - " + datas
                    .nationality;
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
        },
        success: (data) => {
            let status = JSON.parse(data).status;
            if (status) {
                let t = JSON.parse(data);
                let datas = JSON.parse(data).data;
                let count = Object.keys(t).length
                let html = "";
                console.log(data);

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

$('#add_flight').click(() => {
    $('#toshow').show();
})
</script>

</html>