<?php
$servername = "localhost";
$database = "db_admin"; // Database untuk admin
$username = "root";
$password = "";

// Koneksi ke database
$conn_admin = mysqli_connect($servername, $username, $password, $database);

// Periksa koneksi
if (!$conn_admin) {
    die("Koneksi Gagal : " . mysqli_connect_error());
} else {
    echo "Koneksi Admin Berhasil";
}
?>
