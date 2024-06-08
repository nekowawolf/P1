<?php
session_start(); // Memulai session

// Menghubungkan ke database
require 'koneksi_web3donate.php';

// Memeriksa apakah email sudah disimpan dalam session
if (!isset($_SESSION['user_email'])) {
    // Jika tidak ada email dalam session, redirect ke halaman login
    header("Location: signin.html");
    exit();
}

// Mengambil email dari session
$email = $_SESSION['user_email'];

// Mengambil data dari form
$subject = $_POST['subject'];
$message = $_POST['message'];

// Lakukan sanitasi input untuk mencegah SQL Injection
$subject = mysqli_real_escape_string($conn, $subject);
$message = mysqli_real_escape_string($conn, $message);

// Menyusun query untuk menyimpan data ke tabel feedback
$query_sql = "INSERT INTO feedback (email, subject, message) VALUES ('$email', '$subject', '$message')";

// Menjalankan query
if (mysqli_query($conn, $query_sql)) {
    header("Location: feedback.html");
    exit();
} else {
    echo "Error: " . $query_sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>