<?php
include_once '../controlers/plane_controlers.php';
    if(isset($_GET['planes'])) {
    plane_controlers::getPlanes();
    }
?>