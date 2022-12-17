<?php
    class airport {
        public function __construct() 
        {
            
        }

        public static function getAirports() {
            require_once "../database/database.php";
            $query = "select * from airport";
            $result = $conn->query($query);
            $data = array();
            while($row = $result->fetch_assoc()) {
            $data[] = $row;
            }
            echo json_encode(array('status' => true, 'data' => $data));
        }
    }
?>