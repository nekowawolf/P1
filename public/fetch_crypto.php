<?php
// Menghubungkan ke database
require 'koneksi_crypto.php';

// Mengambil data dari database
$query_sql = "SELECT * FROM crypto";
$result = mysqli_query($conn_crypto, $query_sql);

// Menyimpan hasil dalam variabel untuk digunakan di file HTML
$crypto_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $crypto_data[] = $row;
    }
}

// Menutup koneksi
mysqli_close($conn_crypto);

// Mengembalikan data sebagai array
return $crypto_data;
?>
