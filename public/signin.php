<?php
session_start(); // Memulai session

require 'koneksi_web3donate.php'; // Pastikan file koneksi benar

// Mengambil data dari form login
$email = $_POST["email"];
$password = $_POST["password"];

// Sanitasi input untuk mencegah SQL Injection
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Membuat query SQL untuk memeriksa user dengan role 'user'
$query_sql = "SELECT * FROM users WHERE email = ? AND password = ? AND role = 'user'";

// Menyiapkan statement
$stmt = mysqli_prepare($conn, $query_sql);
if ($stmt === false) {
    die('Query Error: ' . mysqli_error($conn));
}

// Mengikat parameter
mysqli_stmt_bind_param($stmt, 'ss', $email, $password);

// Menjalankan statement
mysqli_stmt_execute($stmt);

// Mendapatkan hasil
$result = mysqli_stmt_get_result($stmt);

// Memeriksa apakah hasil query mengembalikan baris yang lebih dari 0
if ($row = mysqli_fetch_assoc($result)) {
    // Jika login berhasil, simpan informasi ke dalam session
    $_SESSION['user_email'] = $email; // Menyimpan email ke dalam session
    header("Location: index.php"); // Redirect ke halaman user
    exit();
} else {
    // Jika login gagal, redirect ke halaman error
    header("Location: wrongps.html");
    exit();
}

// Menutup statement dan koneksi
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
