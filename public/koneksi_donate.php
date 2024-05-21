<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_donate";

// Membuat koneksi
$conn_donate = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn_donate->connect_error) {
    die("Connection failed: " . $conn_donate->connect_error);
}
?>