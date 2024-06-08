<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_payment";

// Membuat koneksi
$conn_payment = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn_payment->connect_error) {
    die("Connection failed: " . $conn_payment->connect_error);
}
?>