<?php
$servername = "localhost";
$username = "root";  // Ganti dengan username database Anda
$password = "";  // Ganti dengan password database Anda
$database = "db_crypto";  // Nama database yang baru dibuat

// Membuat koneksi
$conn_crypto = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn_crypto) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
