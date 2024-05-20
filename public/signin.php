<?php
session_start(); // Memulai session

require 'koneksi_user.php';

$email = $_POST["email"];
$password = $_POST["password"];

// Lakukan sanitasi input untuk mencegah SQL Injection
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$query_sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['user_email'] = $email; // Menyimpan email ke dalam session
    header("Location: index.html");
    exit();
} else {
    header("Location: worngps.html");
    exit();
}
?>
