<?php
$servername = "localhost";
$database = "db_user";
$username = "root";
$password = "";

// Koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi Gagal : " . mysqli_connect_error());
} else {
    echo "Koneksi Berhasil";
}
?>
