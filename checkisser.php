<?php
session_start();
if(isset($_SESSION['admin'])) {
    echo $_SESSION['admin'];
    unset($_SESSION['admin']);
}
else {
    echo 'Nothing';
}
?>