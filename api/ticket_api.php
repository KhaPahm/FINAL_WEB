<?php
include_once "../controlers/ticket_controlers.php";

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['nationality']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['flight_id']) && isset($_POST['price']) && isset($_POST['typeofseat'])) {
    $fanme = $_POST['fname']; 
    $lname = $_POST['lname']; 
    $nationality = $_POST['nationality']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 
    $flight_id = $_POST['flight_id']; 
    $price = $_POST['price']; 
    $typeofseat = $_POST['typeofseat'];
    ticket_controlers::bookTicket($fanme, $lname, $nationality, $email, $phone, $flight_id, $price, $typeofseat);
} else {
    echo json_encode(array("status" => 'sai'));
}



?>