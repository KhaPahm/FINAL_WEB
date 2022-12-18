<?php

use Omnipay\Common\Issuer;

    header('Access-Control-Allow-Origin: *');
    error_reporting(E_ALL ^ E_NOTICE);  
    include_once('../controlers/user_controllers.php');
    session_start();

    // Sign up form
    if(isset($_POST['email_signup'])) {
        $email = $_POST['email_signup'];
        $password = $_POST['password_signup'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $nationality = $_POST['nationality'];
        user_controllers::signUp($email, $password, $fname, $lname, $phone, $nationality);
    }
    
    //Confirm otp form
    else if(isset($_POST['otp']) && isset($_SESSION['email_signup'])) {
        user_controllers::checkOtp($_SESSION['email_signup'], $_POST['otp']);
    }

    //Login form
    else if(isset($_POST['email_login']) && isset($_POST['password_login']) && (!isset($_SESSION['logged_in']) && !isset($_SESSION['admin']))) {
        user_controllers::logIn($_POST['email_login'], $_POST['password_login']);
    }

    //Profile customer
    else if(isset($_GET['customer_infor'])) {
        if(isset($_SESSION['logged_in'])) {
            user_controllers::getCustomerInfor($_SESSION['logged_in']);
        } else {
            echo json_encode(array('status' => false, 'mess' => 'Chua dang nhap'));

        }
    }

    else if(isset($_POST['user_infor'])) {
        user_controllers::getUserInfor($_POST['user_infor']);
    }

    //Forgot password
    else if(isset($_POST['email_forgot'])) {
        $_SESSION['pass_forgot'] = $_POST['pass_forgot'];
        user_controllers::forGotPassword($_POST['email_forgot']);
    }

    //Check otp forgorpassword
    else if(isset($_POST['otp_forgot'])) {
        user_controllers::verifyForGotPassword($_SESSION['email_forgot'], $_SESSION['pass_forgot'], $_POST['otp_forgot']);
    }

    //Change password from
    else if(isset($_POST['old_pass']) && isset($_POST['new_pass'])) {
        user_controllers::changePasswor($_SESSION['logged_in'], $_POST['old_pass'], $_POST['new_pass']);
    }
    
    else if(isset($_GET['logged_in'])) {
        // session_start();
        if(isset($_SESSION['logged_in'])) {
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false, 'message' => "din't sign in!"));

        }
    }

    else if(isset($_GET['logged_in_admin'])) {
        // session_start();
        if(isset($_SESSION['admin'])) {
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false, 'message' => "din't sign in!"));

        }
    }

    else if(isset($_GET['users'])) {
        user_controllers::getUser();
    }

    else if(isset($_GET['log_out'])) {
        if(isset($_SESSION['logged_in'])) {
            unset($_SESSION['logged_in']);
        } 
        if(isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        echo json_encode(array('status' => true));
        
    } 
    
    
    else {
        echo json_encode(array('status' => false));
    }