<?php
include_once '../models/admin.php';
class admin_controlers {
    public function __construct()
    {
        
    }

    public static function addAccount($username, $password) {
        admin::addAccount($username, $password);
    }
}
?>