<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button> <a href="index.html">ADD NEW INFO</a></button>
</body>
</html>


<?php
require('connection.php');

// SQL query to select all rows from the stdnt table
$sql = "SELECT * FROM stdnt";

// Execute the SQL query
$result = $connect->query($sql);

// Check if there are any rows returned by the query
if ($result->num_rows > 0) {
    // If there are rows, start displaying the data in a table format
    echo "<h2>Students Info</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Contact</th><th>Address</th><th>Email</th><th>Class</th></tr>";
    
    // Loop through each row in the result set
    while($row = $result->fetch_assoc()) {
        // Display each row of data in a table row
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["contact"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["class"] . "</td>";
        echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>";

        echo "</tr>";
    }
    
    // Close the table
    echo "</table>";
} else {
    // If no rows are returned by the query, display a message
    echo "0 results";
}

// Close the database connection
$connect->close();
?>
