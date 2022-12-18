<?php
require_once('../models/user.php');
class user_controllers {
    public function __construct()
    {
        
    }

    public static function logIn($email, $password) {
        return user::logIn($email, $password);
    }

    public static function signUp($email, $password, $fname, $lname, $phone, $nationality) {
        return user::signUp($email, $password, $fname, $lname, $phone, $nationality);
    }

    public static function checkOtp($email, $otp) {
        return user::checkOtp($email, $otp);
    }

    public static function getCustomerInfor($email)
    {
        return user::getCustomerInfor($email);
    }

    public static function getUserInfor($userid) {
        return user::getUserInfor($userid);
    }

    public static function forGotPassword($email) {
        return user::forgotPassword($email);
    }

    public static function verifyForGotPassword($email, $password, $otp)
    {
        return user::verifyForGotPassword($email, $password, $otp);
    }

    public static function changePasswor($email, $oldPass, $newPass) {
        return user::changePasswor($email, $oldPass, $newPass);
    }

    public static function getUser()
    {
        return user::getUser();
    }

}
?>