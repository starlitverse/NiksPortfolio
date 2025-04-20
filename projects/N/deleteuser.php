<?php 
session_start();
if(!isset($_SESSION['id'])){
    echo '<script>windows: location="index.php"</script>';
}

$session = $_SESSION['id'];
include 'db.php';

// Get the user name for the session
$result = mysqli_query($conn, "SELECT * FROM user WHERE id= '$session'");
while($row = mysqli_fetch_array($result)) {
    $sessionname = $row['name'];
}

// Delete all users except the current session user
$q = "DELETE FROM user WHERE id !=$session";
mysqli_query($conn, $q); // Pass the connection as the first argument

header("Location: user.php");
?>
