<?php

$hostname = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "studentform"; 

$conn = new mysqli($hostname, $username, $password);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE){
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS users (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `studentName` varchar(255) NOT NULL,
    `rollNo` int(10) NOT NULL,
    `standard` varchar(200) NOT NULL,
    `dob` date NOT NULL,
    `contactNumber` varchar(255) NOT NULL,
    `address` varchar(200) NOT NULL
    )";
    
    if ($conn->query($sql) === FALSE){
        die("Error creating table: " . $conn->error);
    }
?> 