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
                            <button onclick="show(' toshow')">Add record</button>
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

    <script src="./js/admin.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->

</body>

</html>