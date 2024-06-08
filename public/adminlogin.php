<?php
require 'koneksi_web3donate.php';

// Mendapatkan data dari form login
$username = $_POST["username"];
$password = $_POST["password"];

// Hashing password untuk keamanan (disarankan)
$hashed_password = $password; // Sesuaikan dengan hashing yang Anda gunakan saat menyimpan password

// Membuat query SQL menggunakan prepared statements
$query_sql = "SELECT * FROM users WHERE username = ? AND role = 'admin'";

// Menyiapkan statement
$stmt = mysqli_prepare($conn, $query_sql);
if ($stmt === false) {
    die('Query Error: ' . mysqli_error($conn));
}

// Mengikat parameter
mysqli_stmt_bind_param($stmt, 's', $username);

// Menjalankan statement
mysqli_stmt_execute($stmt);

// Mendapatkan hasil
$result = mysqli_stmt_get_result($stmt);

// Memeriksa apakah hasil query mengembalikan baris yang lebih dari 0
if ($row = mysqli_fetch_assoc($result)) {
    // Verifikasi password
    if ($row['password'] === $hashed_password) { // Sesuaikan dengan cara Anda menyimpan password
        // Jika berhasil, redirect ke halaman dashboard
        header("Location: tb_donate.php");
        exit();
    } else {
        // Jika password tidak cocok, redirect ke halaman error
        header("Location: wrongpsadmin.html");
        exit();
    }
} else {
    // Jika username tidak ditemukan atau bukan admin, redirect ke halaman error
    header("Location: wrongpsadmin.html");
    exit();
}

// Menutup statement dan koneksi
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
