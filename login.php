<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="./views/css/login.css">
    <title> AirTech Login</title>
    <link rel="shortcut icon" href="./views/images/Logo.png" />

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <div class="c1">

            <div class="c11">
                <h1 class="mainhead"
                    style="padding: 5px; Color: #5DA7DB; background: rgba(255, 255, 255, 0.525); font-size: 24px;">FLY
                    AIRLINE</h1>

            </div>
            <div id="left">
                <h1 class="s1class"><span>SIGN</span><span class="su">IN</span>
                </h1>
            </div>
            <div id="right">
                <h1 class="s2class"><span>SIGN</span><span class="su">UP</span></h1>
            </div>
        </div>
        <div class="c2">
            <div class="signup">
                <form id="sign_up" onsubmit="return false;">
                    <h1 class="signup1">SIGN UP</h1>
                    <div class="full-name">
                        <input name="fname" type="text" placeholder="First name*" class="username"
                            style="width: 300px;margin-right: 5px" id="fname" />

                        <input name="lname" type="text" placeholder="Last name*" class="username"
                            style="width: 300px;  margin-left: 5px" id='lname' />
                    </div>

                    <input name="nationality" id="nationality" type="text" placeholder="Nationality*"
                        class="username" />

                    <input name="phone" id="phone" type="text" placeholder="Phone*" class="username" />

                    <input name="email_signup" id="email_signup" type="email" placeholder="Email*" class="username" />

                    <div class="full-name">
                        <input name="password_signup" id="password_signup" type="password" placeholder="Password*"
                            class="username" style="width: 300px;margin-right: 5px" />

                        <input name="confirm_password" id="confirm_password" type="password"
                            placeholder="Confirm password*" class="username" style="width: 300px;  margin-left: 5px" />
                    </div>


                    <button class="btn" id="btn_sign_up">Sign Up</button>
                </form>

            </div>


            <form class="signin" id="login_form" onsubmit="return false;">

                <h1 class="signup1">SIGN IN</h1>
                <br><br>
                <input name="email_login" type="text" placeholder="Email*" class="username" />

                <input name="password_login" type="password" placeholder="Password*" class="username" />

                <button class="btn" id="btn_login">Get Started</button>

                <br><br><br><br>
                <a>
                    <p class="signup2" id="forgot_password">Forget Password?</p>
                </a>
            </form>

            <form class="forgot" id="forgot_form" onsubmit="return false;">

                <h1 class="signup1">FORGOT PASSWORD</h1>
                <br><br>
                <input id="email_forgot" name="email_forgot" type="email" placeholder="Email*" class="username" />

                <input id="pass_forgot" name="pass_forgot" type="password" placeholder="New password*"
                    class="username" />

                <input id="confirm_pass_forgot" type="password" placeholder="Confirm new password*" class="username" />

                <button class="btn" id="btn_forgot">GET OTP</button>
            </form>

        </div>
    </div>


    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Sign up done!</h2>
            <a class="close" href="#">&times;</a>
            <h4>Please check <a href="https://mail.google.com/">your mail</a> and enter otp code:</h4>

            <div class="content">

                <form onsubmit="return false;" id="otp">
                    <input name="otp" type="number" placeholder="OTP code" width="100%" />
                    <button class="btn_modal" id="verify">Enter</button>
                </form>
            </div>
        </div>
    </div>

    <div id="popup2" class="overlay">
        <div class="popup">
            <h2>Set new password done!</h2>
            <a class="close" href="#">&times;</a>
            <h4>Please check <a href="https://mail.google.com/">your mail</a> and enter otp code:</h4>

            <div class="content">

                <form onsubmit="return false;">
                    <input id="otp_forgot" name="otp" type="number" placeholder="OTP code" width="100%" />
                    <button class="btn_modal" id="verify_forgot">Enter</button>
                </form>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="./views/js/login.js"></script>

</body>


</html>