<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class user {
    public function __construct()
    {
        
    }

    public static function logIn($email, $password) {
        require_once "../database/database.php";
        $query = "select * from Account where email = '" . $email."'";
        $result = $conn->query($query);
        $count = $result->num_rows;
        if($count <= 0) {
            echo json_encode(array("status" => false));
        } else {
            while($row = $result->fetch_assoc()) {
                $p = $row['password'];
                $v = $row['verify'];
                $r = $row['role'];
                if($v == 1) {
                    if(password_verify($password, $p)) {
                        session_start();
                        if($r == 1) {
                            $_SESSION['logged_in'] = $email; //save session when user loged to system
                        } else {
                            $_SESSION['admin'] = $email; //save session when admin loged to system
                        }
                        echo json_encode(array("status" => true, "role" => $r));
                        
                    } else {
                        echo json_encode(array("status" => false, 'mesage' => 'Wrong password or username'));
                    }
                } else {
                    echo json_encode(array("status" => false, 'mesage' => 'Wrong password or username'));
                }
                
            }
        }

    }

    public static function signUp($email, $password, $fname, $lname, $phone, $nationality) {
        function hashPassword($pass) {
            $options = [
                'cost' => 10,
            ];
            $hpass = password_hash($pass, PASSWORD_BCRYPT, $options);
            return $hpass;
        }

        require_once "../database/database.php";
        $checkUser = "select * from Account where email = '" . $email."'";
        $resultCheck = $conn->query($checkUser);
        $countUser = $resultCheck->num_rows;
        if($countUser > 0) {
            while ($row = $resultCheck->fetch_assoc()) {
                $v = $row['verify'];
                if($v == 1) {
                    echo json_encode(array("status" => false));
                }
                else {
                    //UPDATE AND RESEND OTP & PASSWORD
                    $otp = rand(1000, 9999);
                    $hpass = hashPassword($password);
                    $query = "update account set password = '" . $hpass . "', opt = '" . $otp . "' where email = '" . $email . "'";
                    $conn->query($query);
                    user::verifyUser($email, $otp);
                    session_start();
                    $_SESSION['email_signup'] = $email;
                    echo json_encode(array("status" => true));
                }
            }
        } else {
            $hpass = hashPassword($password);
            $otp = rand(1000, 9999);
            $insertAccount = "insert into Account (email, password, opt) values ('" . $email . "','" . $hpass . "','" . $otp . "')";
            $conn->query($insertAccount);
            $insertCustomerInfor = "insert into Customer (firstname, lastname, phone, nationality, email) values ('" . $fname . "','" . $lname . "','" . $phone . "','" . $nationality . "','" . $email . "')";
            $conn->query($insertCustomerInfor);
            user::verifyUser($email, $otp);
            session_start();
            $_SESSION['email_signup'] = $email;
            echo json_encode(array("status" => true));
        }
        
    }

    public static function checkOtp($email, $otp)
    {
        require_once "../database/database.php";
        $check = "select * from Account where email = '" . $email . "' and opt = '" . $otp . "'";
        $resultCheck = $conn->query($check);
        $countUser = $resultCheck->num_rows;
        if ($countUser == 1) {
            $updateVerify = "update account set verify = true where email = '" . $email . "';";
            $conn->query($updateVerify);
            //clear session email-signup and set session logined
            session_start();
            unset($_SESSION['email_signup']);
            $_SESSION['logged_in'] = $email; //save session when user has signed up
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false, 'message' => 'Wrong otp'));
        }
    }


    public static function verifyUser($email, $otp) {
        require "../vendor/autoload.php";
        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "khapham1909@gmail.com";
        $mail->Password = "addqthixfgyptkbn";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->setFrom('khapham1909@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = "[NO REPLY] VERIFY YOUR ACCOUNT IN AIRTECH GROUP SYSTEM";
        $mail->Body = "<div>Hi,</div> <br> <div>This is your otp: </div> <h3>".$otp."</h3> <br> <div>Thank you!</div>";
        $mail->send();
    }

    public static function getCustomerInfor($email) {
        require_once "../database/database.php";
        $query = "select * from customer where email = '".$email."'";
        $result = $conn->query($query);
        $data = array();
        while($row = $result->fetch_assoc()) {
            $data = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function forgotPassword($email) {
        require_once "../database/database.php";
        $checkUser = "select * from Account where email = '" . $email."'";
        $resultCheck = $conn->query($checkUser);
        $countUser = $resultCheck->num_rows;
        if($countUser <= 0) {
            unset($_SESSION['pass_forgot']);
            echo json_encode(array("status" => false));
        } else {
            $otp = rand(1000, 9999);
            $updateOTP = "update account set opt = '" . $otp . "'";
            $conn->query($updateOTP);
            user::verifyUser($email, $otp);
            session_start();
            $_SESSION['email_forgot'] = $email;
            echo json_encode(array("status" => true));
        }
    }

    public static function verifyForGotPassword($email, $password, $otp) {
        require_once "../database/database.php";
        $check = "select * from Account where email = '" . $email . "' and opt = '" . $otp . "'";
        $resultCheck = $conn->query($check);
        $countUser = $resultCheck->num_rows;
        if ($countUser == 1) {
            $options = [
                'cost' => 10,
            ];
            $hpass = password_hash($password, PASSWORD_BCRYPT, $options);
            $updatePassword = "update account set password = '" . $hpass . "' where email = '" . $email . "'";
            $conn->query($updatePassword);
            unset($_SESSION['email_forgot']);
            unset($_SESSION['pass_forgot']);
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public static function changePasswor($email, $oldPass, $newPass) {
        require_once "../database/database.php";
        $query = "select * from Account where email = '" . $email."'";
        $result = $conn->query($query);

        while($row = $result->fetch_assoc()) {
            $p = $row['password'];
            if(password_verify($oldPass, $p)) {
                $options = [
                    'cost' => 10,
                ];
                $hpass = password_hash($newPass, PASSWORD_BCRYPT, $options);
                $updatePassword = "update account set password = '" . $hpass . "' where email = '" . $email . "'";
                $conn->query($updatePassword);
                echo json_encode(array("status" => true));
            } else {
                echo json_encode(array("status" => false));
            }
        }
    }
}
?>