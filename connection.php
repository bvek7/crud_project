<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "crud";

$connect = mysqli($server, $user, $pass, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
