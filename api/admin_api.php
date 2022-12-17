<?php
include_once '../controlers/admin_controlers.php';
if(isset($_POST['username_admin']) && isset($_POST['password_admin'])) {
    admin_controlers::addAccount($_POST['username_admin'], $_POST['password_admin']);
}
?>