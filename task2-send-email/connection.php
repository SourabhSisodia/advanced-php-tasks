<?php

$server = "localhost";
$username = "root";
$password = "*123#ss";
$database = "company";


$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error)
    echo "Connection error:" . $connect->connect_error;
else
    echo "Connection is created successfully"; ?>