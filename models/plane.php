<?php 
    class plane {
        public function __construct()
        {
            
        }

        public static function getPlanes() {
        include_once "../database/database.php";
        $query = "select * from plane where deleted = 0";
        $result = $conn->query($query);
        $data = array();
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
        }
    }
?>