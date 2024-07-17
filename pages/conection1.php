<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "roommatefinder";

// Create a connection using mysqli_connect
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
