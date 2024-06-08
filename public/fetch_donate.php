<?php
// Menghubungkan ke database
require 'koneksi_web3donate.php';

// Mengambil data dari database
$query_sql = "SELECT * FROM donate";
$result = mysqli_query($conn, $query_sql);

// Menyimpan hasil dalam variabel untuk digunakan di file HTML
$donate_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $donate_data[] = $row;
    }
}

// Menutup koneksi
mysqli_close($conn);

// Mengembalikan data sebagai array
return $donate_data;
?>
