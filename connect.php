<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "canopy";

// create connect to database
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// check the connect
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// it will create db if it is not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
} else {
    
    die("Error creating database: " . $conn->error);
}

// move to the database
$conn->select_db($dbname);
?>