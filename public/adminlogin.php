<?php
require 'koneksi_admin.php';

// Mendapatkan data dari form login
$username = $_POST["username"];
$password = $_POST["password"];

// Membuat query SQL untuk mencocokkan username dan password
$query_sql = "SELECT * FROM admin 
            WHERE username = '$username' AND password = '$password'";

// Menjalankan query SQL
$result = mysqli_query($conn_admin, $query_sql); // Perbaiki variabel menjadi $conn_admin

// Memeriksa apakah hasil query mengembalikan baris yang lebih dari 0
if (mysqli_num_rows($result) > 0) {
    // Jika berhasil, redirect ke halaman dashboard
    header("Location: tb_donate.php");
} else {
    // Jika gagal, redirect ke halaman error
    header("Location: worngpsadmin.html");
    exit(); // Hentikan eksekusi script
}
