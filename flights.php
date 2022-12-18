<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./views/css/flights.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- css.gg -->
    <link href='https://css.gg/css' rel='stylesheet'>

    <!-- UNPKG -->
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>

    <!-- JSDelivr -->
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <header>

        <h1 class="animate__animated animate__backInDown">HEADER</h1>
    </header>

    <section class="booking">

        <div class="container">
            <div class="info">
                <div class="destination">
                    <p>HCM-TSN</p>
                    <a href=""><i class="gg-arrows-exchange-alt"></i></a>
                    <P>HN-NB</P>
                </div>

                <div class="datefly">
                    <i class="gg-calendar-dates"></i>
                    <p>30 Dec</p>
                </div>

                <div class="quan_pass">
                    <i class="gg-user"></i>
                    <p>1 Passenger</p>
                </div>

                <div class="class_fly">
                    <i class="gg-airplane"></i>
                    <p>Business class</p>
                </div>

                <div class="change_search">
                    <a href="landing.html">
                        <i class="gg-search"></i>
                        <p>change search</p>
                    </a>
                </div>


            </div>
            <?php
            if (isset($_GET['takeoff_day']) && isset($_GET['takeoff_airport']) &&  isset($_GET['landing_airport'])) {
                require_once './database/database.php';
                $sql = "SELECT * FROM Flight where takeoffday = '" . $_GET['takeoff_day'] . "' and takeoff_airport = " . $_GET['takeoff_airport'] . " and landing_airport = " . $_GET['landing_airport'] . " order by takeoffday, takeofftime asc;";
                $result = $conn->query($sql);
                if ($result->num_rows == 0) {
                    echo "<div class='title animate__animated animate__backInDown'>
                        <h1>Top search result</h1>
                        <p style='text-align: center;'>Xin lỗi quý khách! Chúng tôi không tìm thấy chuyến bay nào phù hợp với yêu cầu của quý khách! Xin vui lòng chọn lại!</p>
                    </div>";
                } else {
                    echo "<div class='title animate__animated animate__backInDown'>
                        <h1>Top search result</h1>
                        <p>Chúng tôi đã tìm thấy những chuyến bay phù hợp nhất với bạn!</p>
                    </div>"; ?>


        </div>

    </section>

    <section class="result">
        <div class="container">


            <?php
                    while ($row = $result->fetch_assoc()) {

                        echo "<div class='flight'>
                        <div class='branch'>
                            <img src='./views/images/Logo.png' alt=''>
                        </div>
                        <div class='detail'>
                            <div class='time'>
                                <p>" . $row['takeoffday'] . "</p>
                                <h4>" . $row['takeofftime'] . "</h4>
        
                            </div>
        
                            <div class='duration'>

                                <div class='map'>
                                    <i class='gg-edit-black-point'></i>
                                    <span>-------</span>
                                    <i class='mid fas fa-regular fa-plane-departure'></i>
                                    <span>-------</span>
                                    <i class='fa fa-duotone fa-location-dot'></i>
                                </div>
                            </div>
        
                            <div class='time'>
                                <p>" . $row['landingdate'] . "</p>
                                <h4>" . $row['landingtime'] . "</h4>
        
                            </div>
        
                        </div>
                        <div class='price'>
                            <div class='price_detail'>
                                <p>Start from</p>
                                <h4>" . number_format($row['basicprice'], 0, '', ',') . "<span>/PAX</span></h4>
                                <button id='" . $row['flight_id'] . "' class='btn_booking'><a href='http://localhost/final_web/booking.php?flight_id=" . $row['flight_id'] . "'>Book now</a></button>
                            </div>
        
                        </div>
                    </div>";
                    }
                }
            }

    ?>




        </div>
    </section>
    <script src="flights.js"></script>
</body>

</html>