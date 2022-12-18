<?php
include_once('../controlers/flight_controller.php');
session_start();


if (isset($_POST['takeoff_day']) && isset($_POST['takeoff_airport']) && isset($_POST['landing_airport'])) {
    $day = $_POST['takeoff_day'];
    $takeofAirPort = $_POST['takeoff_airport'];
    $landingAirPort = $_POST['landing_airport'];
    $flight_control = flight_controller::findFlights($day, $takeofAirPort, $landingAirPort);
} else if (isset($_GET['flights'])) {
    flight_controller::getFlights();
} else if (isset($_POST['flight_id'])) {
    flight_controller::getFligthsById($_POST['flight_id']);
} else if (isset($_GET['flight_id'])) {
    flight_controller::getFligthsById($_GET['flight_id']);
} else if (
    isset($_POST['takeofftime']) && isset($_POST['takeoffday']) && isset($_POST['landingtime']) && isset($_POST['landingdate'])
    && isset($_POST['basicprice']) && isset($_POST['notes']) && isset($_POST['plane_id']) && isset($_POST['takeoff_airport']) && isset($_POST['landing_airport']) && isset($_SESSION['admin'])
) {
    $takeofftime = $_POST['takeofftime'];
    $takeoffday = $_POST['takeoffday'];
    $landingtime = $_POST['landingtime'];
    $landingdate = $_POST['landingdate'];
    $basicprice = $_POST['basicprice'];
    $notes = $_POST['notes'];
    $plane_id = $_POST['plane_id'];
    $takeoff_airport = $_POST['takeoff_airport'];
    $landing_airport = $_POST['landing_airport'];
    flight_controller::addFlight($takeofftime, $takeoffday, $landingtime, $landingdate, $basicprice, $notes, $plane_id, $takeoff_airport, $landing_airport);
} else if (isset($_POST['upload_flight_id']) && isset($_POST['new_price']) && isset($_SESSION['admin'])) {
    $idflight = $_POST['upload_flight_id'];
    $newprice = $_POST['new_price'];
    flight_controller::updateFlight($idflight, $newprice);
} else {
    echo json_encode(array('status' => false));
}