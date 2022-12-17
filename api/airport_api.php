<?php
include_once "../controlers/airport_controlers.php";
if(isset($_GET['airports'])) {
    airport_controlers::getAirports();
}
?>