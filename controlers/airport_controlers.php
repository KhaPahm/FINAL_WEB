<?php
include_once("../models/airport.php");
class airport_controlers {
    public function __construct()
    {
        
    }

    public static function getAirports() {
        return airport::getAirports();
    }
}
?>