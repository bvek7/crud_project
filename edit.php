<?php
require('connection.php');

// Check if the form is submitted for updating
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $class=$_POST['class'];
    // Retrieve other fields (contact, address, email, class)

    // Update query
    $update_sql = "UPDATE stdnt SET first_name='$first', last_name='$last',contact='$contact',email='$email',class='$class',address='$address' WHERE id='$id'";
    
    if ($connect->query($update_sql) === TRUE) {
        // If the update is successful, redirect back to index.php or display a success message
        header("Location: fetch.php");
        exit();
    } else {
      
        echo "Error updating record: " . $connect->error;
    }
}

// Check if ID parameter is set for editing
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student data based on the provided ID
    $sql = "SELECT * FROM stdnt WHERE id='$id'";
    $result = $connect->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Display the form pre-filled with existing student data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post" action="">
        <!-- Hidden input field to pass student ID -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <label for="first">First Name:</label><br>
        <input type="text" id="first" name="first" value="<?php echo $row['first_name']; ?>"><br><br>
        
        <label for="last">Last Name:</label><br>
        <input type="text" id="last" name="last" value="<?php echo $row['last_name']; ?>"><br><br>
        
        <label for="contact">Contact:</label><br>
        <input type="text" id="contact" name="contact" value="<?php echo $row['contact']; ?>"><br><br>
        
        <label for="address">address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"><br><br>
        
        
        <label for="email">email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
        
        <label for="class">class:</label><br>
        <input type="text" id="class" name="class" value="<?php echo $row['class']; ?>"><br><br>
        
        
        <!-- Other fields for editing (contact, address, email, class) -->
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
<?php
    } else {
        echo "Student not found";
    }
} else {
    echo "Student ID not provided";
}

$connect->close();
?>