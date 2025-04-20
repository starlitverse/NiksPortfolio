<?php session_start(); ?>
<?php
include 'db.php';
$id = $_REQUEST['id'];

// Make sure the id is valid
if (!$id) {
    die("Error: ID not provided.");
}

// Query the database
$result = mysqli_query($conn, "SELECT * FROM owners WHERE id = '$id'");

// Check if the query was successful
if (!$result) {
    die("Error: Query failed.");
}

// Fetch the result
$test = mysqli_fetch_array($result);

// Check if the result is empty (no record found)
if (!$test) {
    die("Error: Data not found.");
}

// If data is found, assign the values
$id = $test['id'];
$lname = $test['lname'];
?>
<form action="delbillexec.php" method="post">
    <h1>Are you sure you want to delete this record, <?php echo $lname; ?>?</h1>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <input type="submit" name="ok" value="Delete">
</form>
