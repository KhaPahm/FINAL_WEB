<?php
    $host = 'localhost';
    $dbName = 'web_final';
    $username_sql = 'root';
    $password_sql = 'root1234';

    $conn = new mysqli($host, $username_sql, $password_sql, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>