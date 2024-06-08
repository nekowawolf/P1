<?php
session_start(); // Memulai session

// Menghubungkan ke database
require 'koneksi_web3donate.php';

// Memeriksa apakah user sudah login
if (!isset($_SESSION['user_email'])) {
    header("Location: signin.html");
    exit();
}

// Mengambil email dari session
$user_email = $_SESSION['user_email'];

// Mengambil data user dari database
$query_sql = "SELECT * FROM users WHERE email = '$user_email'";
$result = mysqli_query($conn, $query_sql);

// Menyimpan hasil dalam variabel untuk digunakan di file HTML
$user_data = [];
if ($result) {
    $user_data = mysqli_fetch_assoc($result);
}

// Menutup koneksi
mysqli_close($conn);
?>
