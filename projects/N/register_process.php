<?php

$servername = "localhost";
$db_username = "root";  // Avoid naming the PHP variable as 'username' to prevent confusion with SQL column
$db_password = "";      // Avoid naming the PHP variable as 'password' to prevent confusion with SQL column
$dbname = "fuel"; 

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data from POST request
$name = $_POST['name'];
$username = $_POST['username'];   // Form username
$password = $_POST['password'];   // Form password

// Escape the inputs to prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// SQL query to insert user data into the 'user' table
$sql = "INSERT INTO user (name, username, password) VALUES ('$name', '$username', '$password')";

// Execute query and check if insertion was successful
if (mysqli_query($conn, $sql)) {
    // Redirect to admin login page after successful sign up
    header("Location: index.php");
    exit();  // Ensure that no further code is executed after redirection
} else {
    // Error handling in case the query fails
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
