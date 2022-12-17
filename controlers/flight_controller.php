<?php 
include_once('../models/flight.php');
class flight_controller {
    public function __construct()
    {
        
    }

    public static function findFlights($takeOfDayInput, $takeOfAirportInput, $landingAirportInput) {
        return flight::findFlights($takeOfDayInput, $takeOfAirportInput, $landingAirportInput);
    }

    public static function getFlights()
    {
        return flight::getFlights();
    }

    public static function getFligthsById($fid) {
        return flight::getFligthsById($fid);
    }

    public static function addFlight($takeofftime, $takeoffday, $landingtime, $landingdate, $basicprice, $notes, $plane_id, $takeoff_airport, $landing_airport) {
        return flight::addFlight($takeofftime, $takeoffday, $landingtime, $landingdate, $basicprice, $notes, $plane_id, $takeoff_airport, $landing_airport);
    }

    public static function updateFlight($flight_id, $basicprice) {
        return flight::updateFlight($flight_id, $basicprice);
    }
}
?>