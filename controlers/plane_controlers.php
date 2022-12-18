<?php
include_once '../models/plane.php'; 
    class plane_controlers {
        public function __construct()
        {
            
        }

        public static function getPlanes() {
            return plane::getPlanes();
        }
    }
?>