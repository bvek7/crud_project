<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "crud";

$connect = new mysqli($server, $user, $pass, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}