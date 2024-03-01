<?php
require('connection.php');

if(isset($_POST['id']) && isset($_POST['first']) && isset($_POST['last']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['class'])) {
    $id = $_POST['id'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
     $class = $_POST['class'];

    $sql = "INSERT INTO stdnt (id, first_name, last_name, contact,address, email, class) 
            VALUES ('$id', '$first', '$last', '$contact', '$address', '$email', '$class')";

    if ($connect->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
} else {
    echo "All fields are required.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button > <a href="fetch.php">View</a></button>
</body>
</html>