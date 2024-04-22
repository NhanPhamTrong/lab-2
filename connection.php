<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $database = "test_database";

    $mysqli = new mysqli($serverName, $username, $password, $database);

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    echo "Connected successfully";
?>