<?php
// db.php - MySQL connection (mysqli procedural)
$conn = mysqli_connect("localhost", "root", "", "mydatabase");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
