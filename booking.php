<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DetailBooking</title>

    <link href="./views/css/booking.css" rel="stylesheet" media="all">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href='https://css.gg/css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.2.js"
        integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>

</head>

<body>




    <section class="title" style="background-image: url(./views/images/booking/background.jpg);">
        <div>
            <h1>Booking Detail</h1>
            <p>Tell us about you needed</p>
        </div>
    </section>

    <section class="booking">

        <div class="container">
            <div class="service">
                <?php
                require_once "./database/database.php";
                if (isset($_GET['flight_id'])) {
                    $query = 'select distinct f.flight_id, f.takeofftime, f.takeoffday, f.landingtime, f.landingdate, f.basicprice, concat(a.name, " (", a.code, ")") as takeoff, concat(a1.name, " (", a1.code, ")") as landing, p.name as planename, p.no as planeno
                    from (((select flight_id, takeofftime, takeoffday, landingtime, landingdate, basicprice, plane_id, takeoff_airport, landing_airport from flight) f 
                        join (select airport_id, name, code from airport) a on f.takeoff_airport = a.airport_id) 
                        join (select airport_id, name, code from airport) a1 on f.landing_airport = a1.airport_id) 
                        join (select plane_id, name, no from plane) p on p.plane_id = f.plane_id
                        where flight_id =' . $_GET['flight_id'];
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="flights">
                        <div class="worddt">
                            <span><i class="fa-solid fa-plane-departure"></i></span>
                            <p>Flight from ' . $row['takeoff'] . ', VietNam to ' . $row['landing'] . ', VietNam</p>
                        </div>
                        <div class="flight">
                            <div class="branch">
                                <img src="./views/images/Logo.png" alt="">
                            </div>
                            <div class="detail">
                                <div class="time">
                                    <h4>' . $row['takeoffday'] . ' ' . $row['takeofftime'] . '</h4>
                                </div>
    
                                <div class="duration">
                                    <div class="map">
                                        <i class="fa fa-duotone fa-location-dot"></i>
                                        <span>-------</span>
                                        <i class="mid fas fa-regular fa-plane-departure"></i>
                                        <span>-------</span>
                                        <i class="fa fa-duotone fa-location-dot"></i>
                                    </div>
                                </div>
    
                                <div class="time">
                                    
                                    <h4>' . $row['landingdate'] . ' ' . $row['landingtime'] . '</h4>
    
                                </div>
    
                            </div>
                            <div class="price">
    
                                <div class="price_detail">
                                    <p>Temp price</p>
                                    <h4 id="basic_price" price_number = "' . $row['basicprice'] . '">' . number_format($row['basicprice'], 0, '', ',') . 'VND</h4>
                                </div>
    
                            </div>
                        </div>
                    </div>';
                    }
                }
                ?>








            </div>
        </div>
    </section>





    <div class="container-fluid">
        <div class="container2">
            <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h1>Thông tin đặt vé</h1>

                            <span style=" margin-left: 30px; text-align: left;">Lưu ý : *Trường bắt buộc nhập thông tin
                            </span>
                            <!-- Form -->
                            <form id="booking_form">
                                <input id="flight_id" name='flight_id' value='<?php echo $_GET['flight_id'] ?>' hidden>
                                <div class="field " tabindex="1 ">
                                    <label for="hoten ">
                                        <i class="far fa-user "></i>Firstname
                                    </label>
                                    <input name="fname" type="text" required id="fname">
                                </div>
                                <div class="field " tabindex="1 ">
                                    <label for="hoten ">
                                        <i class="lname fa-user "></i>Lastname
                                    </label>
                                    <input name="lname " type="text " required id="lname">
                                </div>
                                <div class="field " tabindex="2 ">
                                    <label for="sdt ">
                                        <i class="far fa-envelope "></i>Phone:
                                    </label>
                                    <input name="phone " type="text " placeholder="+(x) xx xxxxxxx " required
                                        id="phone">
                                </div>

                                <div class="field " tabindex="3 ">
                                    <label for="diachi ">
                                        <i class="far fa-edit "></i>Nationality:
                                    </label>
                                    <input name="nationality " placeholder="nhập địa chỉ " type="text"
                                        id="nationality"></input>
                                </div>
                                <div class="field " tabindex="5 ">
                                    <label for="email ">
                                        <i class="far fa-envelope "></i>Email
                                    </label>
                                    <input name="email " type="text " placeholder="email@domain.com " required
                                        id="email">
                                </div>

                                <div class="sit">
                                    <p> <span><i class="fa-solid fa-map-pin"></i></span> Decide where you will sit
                                        during flight!</p>
                                    <div class="sitcontent">

                                        <div class="standard">
                                            <input type="radio" class="radio_btn" id="s1" name="typeofseat"
                                                value="NORMAL">
                                            <h4><i class="fa-regular fa-window-maximize"></i> Standard</h4>
                                            <p>Window or aisle, your choice</p>
                                            <div class="price_detail">
                                                <p>Temp price</p>
                                                <h4>+0đ</h4>
                                            </div>
                                        </div>

                                        <div class="standard">
                                            <input type="radio" class="radio_btn" id="s2" name="typeofseat"
                                                value="SPECIAL">
                                            <h4><i class="fa-regular fa-window-maximize"></i> Special</h4>
                                            <p>A perfect way to quick move</p>
                                            <div class="price_detail">
                                                <p>Temp price</p>
                                                <h4>x2 Basic price</h4>
                                            </div>
                                        </div>

                                        <div class="standard">
                                            <input type="radio" class="radio_btn" id="s3" name="typeofseat" value="VIP">
                                            <h4><i class="fa-regular fa-window-maximize"></i> Bussiness</h4>
                                            <p>Best position for relax</p>
                                            <div class="price_detail">
                                                <p>Temp price</p>
                                                <h4>x4 Basic price</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="sum" id="sumPrice">
                                    <div class="sumcon">
                                        <span><i class="fa-solid fa-money-check-dollar"></i></span>
                                        <p>Check cost of your flight: <span id="sumPriceVal"></span></p>
                                    </div>

                                </div>

                                <input type="hidden" id="price" value="" name="price">

                                <script
                                    src="https://www.paypal.com/sdk/js?client-id=AVRwyUCI2S9j7aPkdN8mnyUjlldDdU2FCiai_PYpGpJBnGz_s9zGnuhVeY-CU5Xx9LvN8gUg5VKTGP_a&currency=USD">
                                </script>
                                <!-- Set up a container element for the button -->
                                <div id="paypal-button-container"></div>
                                <script>

                                </script>

                            </form>

                            <input type="hidden" id="tongtien" value="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="booked"> BOOK</button>

</body>

<script src="./views/js/booking.js"></script>

</html>