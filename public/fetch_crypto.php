<?php
// Menghubungkan ke database
require 'koneksi_web3donate.php';

// Mengambil data dari database
$query_sql = "SELECT * FROM crypto";
$result = mysqli_query($conn, $query_sql);

// Menyimpan hasil dalam variabel untuk digunakan di file HTML
$crypto_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $crypto_data[] = $row;
    }
}

// Menutup koneksi
mysqli_close($conn);

// Mengembalikan data sebagai array
return $crypto_data;
?>
