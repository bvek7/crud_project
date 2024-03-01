<?php
require('connection.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $delete_sql = "DELETE FROM stdnt WHERE id='$id'";

    if ($connect->query($delete_sql) === TRUE) {
        // If the deletion is successful, redirect back to index.php
        header("Location: fetch.php");
        exit(); // Ensure no more output is sent after redirection
    } else {
        // If there's an error, display an error message
        echo "Error deleting record: " . $connect->error;
    }
} else {
    // If no student ID is provided, display an error message
    echo "Invalid request";
}

$connect->close();
?>
