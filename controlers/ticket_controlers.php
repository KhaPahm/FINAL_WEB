<?php

include_once "../models/ticket.php";
class ticket_controlers{
    public function __construct()
    {
        
    }

    public static function bookTicket($fanme, $lname, $nationality, $email, $phone, $flight_id, $price, $typeofseat) {
        return ticket::bookTicket($fanme, $lname, $nationality, $email, $phone, $flight_id, $price, $typeofseat);
    }

    public static function getTicketsOfUser($userId)
    {
        return ticket::getTicketsOfUser($userId);
    }
}
?>