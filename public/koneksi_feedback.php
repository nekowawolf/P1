<?php
$servername = "localhost";
$username = "root";  // Ganti dengan username database Anda
$password = "";  // Ganti dengan password database Anda
$database = "db_feedback";  // Nama database yang baru dibuat

// Membuat koneksi
$conn_feedback = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn_feedback) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}   else {
    echo "";
}
?>
