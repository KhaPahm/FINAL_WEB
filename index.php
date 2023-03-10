<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> AirTech</title>
    <link rel="shortcut icon" href="./views/images/Logo.png" />

    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    /> -->
    <link rel="stylesheet" href="landing_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a3fe8c29cc.js" crossorigin="anonymous"></script>
    <!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" /> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
        integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->





    <!-- <script src="js/wow.min.js"></script> -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


</head>

<body>
    <header>
        <div class="hdr">
            <nav>
                <div class="container">
                    <div>

                        <!--  -->

                        <a href="index.html">
                            <img src="./views/images/Logo.png" alt="logo" class="logo" />
                        </a>
                        <div class="menu">
                            <ul>
                                <li>
                                    <a href="">Flights</a>
                                </li>
                                <li>
                                    <a href="">Service</a>
                                </li>
                                <li>
                                    <a href="">Contact</a>
                                </li>
                                <li>
                                    <a href="">Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="menu-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div>
                    <h1>
                        Take-off <br />
                        <span>Your Dream!</span> <br />
                    </h1>
                    <p>
                        We bring to you all of service you need to travel around the world!
                    </p>
                    <a href="login.php" class="btn btn-primary none_login"> Log in </a>
                    <a href="login.php" class="btn btn-secondary none_login"> Registation </a>

                    <a href="#" class="btn btn-primary loggedin"> WELCOME BACK
                        <?php session_start();
                        if (isset($_SESSION['logged_in'])) echo $_SESSION['logged_in'] ?> </a>

                    <a class="btn btn-secondary loggedin" id="log_out"> LOG OUT </a>

                    <form action="" onsubmit="return false;">
                        <input type="text" placeholder="Your ID flights"
                            style="border-radius: 1em 0 0 1em ;width: 15em; height: 2em;" id="input_search_ticket">
                        <input type="submit" value="go" style="border-radius:0 1em 1em 0;width: 4em;height: 2.45em;"
                            id="search_ticket">
                    </form>
                </div>

                <div class="booking">
                    <div class="form-back">
                        <div class="form">
                            <div class="tabs">
                                <input type="radio" id="tab1" name="tab-control" checked>
                                <input type="radio" id="tab2" name="tab-control">
                                <ul>
                                    <li title="Features"><label for="tab1" role="button"><svg viewBox="0 0 24 24">
                                            </svg><br><span>One-way</span></label></li>
                                    <li title="Delivery Contents"><label for="tab2" role="button"><svg
                                                viewBox="0 0 24 24">

                                            </svg><br><span><i
                                                    class="fa-solid fa-location-arrow"></i>Return</span></label></li>
                                </ul>

                                <div class="contentform">
                                    <section>
                                        <h2>One-way</h2>
                                        <form action="" class="inputbox" onsubmit="return false;">
                                            <div class="froup">
                                                <label for="name">From</label><br>
                                                <select name="takeoff_airport" id="takeoff_airport">
                                                    <option value="none">SELECT</option>
                                                </select>

                                            </div>

                                            <div class="froup">
                                                <label for="des">Destination</label><br>
                                                <select name="landing_airport" id="landing_airport">
                                                    <option value="none">SELECT</option>
                                                </select>

                                            </div>

                                            <div class="froup">
                                                <label for="des">The Day start</label><br>
                                                <input type="date" name="takeoff_day" required="required"
                                                    id="start_day">

                                            </div>

                                            <!-- <div class="pass">
                                                <div class="froup" id="pax">
                                                    <label for="des">Passengers</label><br>
                                                    <input type="number" name="des" required="required" value="1">

                                                </div>

                                                <div class="froup" id="pax">
                                                    <label for="des">Chirlden</label><br>
                                                    <input type="number" name="des" required="required" value="1">

                                                </div>
                                            </div> -->

                                            <input type="submit" class="btn btn-primary" value="Search" id="search-one">

                                        </form>


                                    </section>
                                    <section>
                                        <h2>Return</h2>
                                        <form action="" class="inputbox">
                                            <div class="froup">
                                                <label for="name">From (City or airport)</label>
                                                <select name="takeoff_airport" id="takeoff_airport_re">
                                                    <option value="none">HN</option>
                                                    <option value="guava">HCM</option>
                                                    <option value="lychee">DN</option>
                                                    <option value="papaya">HP</option>
                                                </select>

                                            </div>

                                            <div class="froup">
                                                <label for="des">Destination (City or airport)</label>
                                                <select name="landing_airport" id="landing_airport_re">
                                                    <option value="none">HN</option>
                                                    <option value="guava">HCM</option>
                                                    <option value="lychee">DN</option>
                                                    <option value="papaya">HP</option>
                                                </select>

                                            </div>

                                            <div class="froup">
                                                <label for="des">The Day start</label><br>
                                                <input type="date" name="des" required="required" id="start_day_re">
                                            </div>

                                            <div class="froup">
                                                <label for="des">Date back</label><br>
                                                <input type="date" name="des" required="required" id="re_day">

                                            </div>



                                            <div class="pass">
                                                <!-- <div class="froup" id="pax">
                                                    <label for="des">Passengers</label><br>
                                                    <input type="number" name="des" required="required" value="1">

                                                </div>

                                                <div class="froup" id="pax">
                                                    <label for="des">Chirlden</label><br>
                                                    <input type="number" name="des" required="required" value="1">

                                                </div>
                                            </div> -->


                                                <input type="submit" class="btn btn-primary" value="Search">

                                        </form>
                                    </section>
                                </div>






                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </header>


    <section class="about">

        <div class="heading">
            <h1 class="wow animate__animated animate__fadeInUp">
                Best of
                <span>Destination</span>
            </h1>
        </div>
        <!-- slide -->
        <div class="swiper aboutSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">

                    <a href="" class="card">
                        <img src="./views/images/Place/Halongbay.jpg" class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>
                                <img class="card__thumb" src="./views/images/nations/vn.png" alt="" />
                                <div class="card__header-text">
                                    <h3 class="card__title">V???NH H??? LONG-VI???T NAM</h3>
                                    <span class="card__status">Natural</span>
                                </div>
                            </div>
                            <p class="card__description">
                                M???t trong 7 k?? quan thi??n nhi??n c???a th??? gi???i, n???m trong top 10 ?????a ??i???m ???????c
                                kh??ch du l???ch ch???n ?????n nhi???u nh???t Vi???t Nam <br>
                                <span>
                                    Kh??m ph?? ch??? t??? 2,500,000??!
                                </span>
                            </p>
                        </div>
                    </a>

                </div>

                <div class="swiper-slide">

                    <a href="" class="card">
                        <img src="./views/images/Place/Cotco.jpg" class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>
                                <img class="card__thumb" src="./views/images/nations/vn.png" alt="" />
                                <div class="card__header-text">
                                    <h3 class="card__title">C???T C??? L??NG C?? - VI???T NAM</h3>
                                    <span class="card__status">History</span>
                                </div>
                            </div>
                            <p class="card__description">
                                Bi???u tr??ng cho ?? ch?? v?? s??? ki??n c?????ng c???a nh???ng con ng?????i ng??y ????m canh gi??? t???ng m???nh
                                ????, m???nh
                                t??nh qu?? h????ng, ?????t n?????c<br>
                                <span>
                                    Kh??m ph?? ch??? t??? 3,000,000??!
                                </span>
                            </p>
                        </div>
                    </a>

                </div>

                <div class="swiper-slide">

                    <a href="" class="card">
                        <img src="./views/images/Place/grandpalace.jpg" class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>
                                <img class="card__thumb" src="./views/images/nations/vn.png" alt="" />
                                <div class="card__header-text">
                                    <h3 class="card__title">The Grand Palace-Thailand</h3>
                                    <span class="card__status">History</span>
                                </div>
                            </div>
                            <p class="card__description">
                                Cung ??i???n ho??ng gia Th??i Lan, bi???u tr??ng cho quy???n l???c v?? d???u ???n l???ch s??? c???a ho??ng gia
                                trong chi???u d??i
                                v??n h??a Th??i Lan!<br>
                                <span>
                                    Kh??m ph?? ch??? t??? 9,000,000??!
                                </span>
                            </p>
                        </div>
                    </a>

                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="service">
                <i class="fas fa-sharp fa-solid fa-shield fa-4x"></i>
                <p>
                    We bring safe flights according to international standards, giving
                    customers a feeling of peace of mind
                </p>
                <h3>SAFE</h3>
            </div>



            <div class="service">
                <i class="fas fa-regular fa-clock fa-4x"></i>
                <p>
                    Flexible time, easy to change tickets and flights
                </p>
                <h3>TIME</h3>
            </div>

            <div class="service">
                <i class=" fas fa-solid fa-users-rays fa-4x"></i>
                <p>
                    Reputation is guaranteed by the number of passengers we have transported
                </p>
                <h3>2000000 passengers</h3>
            </div>

            <div class="service">
                <i class="fas fa-solid fa-gauge-high fa-4x"></i>
                <p>
                    The flight process is fast, without delay and guaranteed on schedule
                </p>
                <h3>FAST</h3>
            </div>
        </div>
    </section>

    <section class="discount">
        <div class="heading">
            <h1 class="wow animate__animated animate__fadeInUp">
                Want to be Economize?
                <span>Become a member now!</span>
            </h1>
        </div>
        <p>
            Register or Sign in to receive member-only offers!
        </p>
        <a href="" class="btn btn-primary">
            Login
        </a>
        <a href="" class="btn btn-secondary">
            Register
        </a>
    </section>

    <footer>
        <!-- <img src="images/Logo2.png" alt="" class="logo2"> -->
    </footer>
    <!-- <script>
    new WOW().init();
    </script> -->
    <script src="./views/js/landing_logic.js"></script>

</body>

<script>
$('#search_ticket').click(() => {
    let id = $('#input_search_ticket').val();
    let href = 'http://localhost/final_web/pdf/pdf.php?ticket_id=' + id;
    window.location.replace(href);
})
</script>


</html>