<?php
 // Memulai session

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

// Mengambil data dari database hanya untuk pengguna yang sedang login
$query_sql = "SELECT * FROM feedback WHERE email = '$email'";
$result = mysqli_query($conn, $query_sql);

// Menyimpan hasil dalam variabel untuk digunakan di file HTML
$feedback_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $feedback_data[] = $row;
    }
}

// Menutup koneksi
mysqli_close($conn);

// Mengembalikan data sebagai array
return $feedback_data;
?>
