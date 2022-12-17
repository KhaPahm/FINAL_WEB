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
    <link rel="stylesheet" href="./views/css/landing_style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a3fe8c29cc.js" crossorigin="anonymous"></script>
    <!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
        integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>






    <script src="js/wow.min.js"></script>

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
                                    <a href="">Discover</a>
                                </li>
                                <li>
                                    <a href="">Service</a>
                                </li>
                                <li>
                                    <a href="">Contact</a>
                                </li>
                                <li>
                                    <a href="">About us</a>
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
                        <?php session_start(); if(isset($_SESSION['logged_in'])) echo $_SESSION['logged_in'] ?> </a>

                    <a class="btn btn-secondary loggedin" id="log_out"> LOG OUT </a>
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

                                            </svg><br><span>Return</span></label></li>
                                </ul>

                                <!-- <div class="content">
                  <section>
                      <h2>One-way</h2>
                      <form action="" class="inputbox">
                        <input type="text" required="required">
                        <span>From (City or airport)</span>

                        <input type="text" required="required">
                        <span>Destination (City or airport)</span>

                        
                      </form>
                      
                      
                  </section> -->
                                <!-- <section>
                      <h2>Return</h2>
                      
                  </section> -->
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
                                    <h3 class="card__title">VỊNH HẠ LONG-VIỆT NAM</h3>
                                    <span class="card__status">Natural</span>
                                </div>
                            </div>
                            <p class="card__description">
                                Một trong 7 kì quan thiên nhiên của thế giới, nằm trong top 10 địa điểm được
                                khách du lịch chọn đến nhiều nhất Việt Nam <br>
                                <span>
                                    Khám phá chỉ từ 2,500,000đ!
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
                                    <h3 class="card__title">CỘT CỜ LŨNG CÚ - VIỆT NAM</h3>
                                    <span class="card__status">History</span>
                                </div>
                            </div>
                            <p class="card__description">
                                Biểu trưng cho ý chí và sự kiên cường của những con người ngày đêm canh giữ từng mảnh
                                đá, mảnh
                                tình quê hương, đất nước<br>
                                <span>
                                    Khám phá chỉ từ 3,000,000đ!
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
                                Cung điện hoàng gia Thái Lan, biểu trưng cho quyền lực và dấu ấn lịch sử của hoàng gia
                                trong chiều dài
                                văn hóa Thái Lan!<br>
                                <span>
                                    Khám phá chỉ từ 9,000,000đ!
                                </span>
                            </p>
                        </div>
                        <a />

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
    <script>
    new WOW().init();
    </script>
    <script src="./views/js/landing_logic.js"></script>

</body>

</html>