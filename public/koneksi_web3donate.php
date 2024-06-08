<?php
$servername = "localhost";
$database = "web3donate";
$username = "root";
$password = "";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
