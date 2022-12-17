<?php 
    class admin {
        public function __construct()
        {
            
        }

        public static function addAccount($username, $password) {
            require_once "../database/database.php";
            $options = [
                'cost' => 10,
            ];
            $hpass = password_hash($password, PASSWORD_BCRYPT, $options);
            $query = "insert into account (email, password, verify, opt, role) values ('" . $username . "', '" . $hpass . "', true, '0000', 3)";
            $conn->query($query);
            echo json_encode(array("status" => true));
        }
    }
?>