<?php
// Menghubungkan ke database
require 'koneksi_donate.php';

// Mengambil data dari database
$query_sql = "SELECT * FROM donate";
$result = mysqli_query($conn_donate, $query_sql);

// Menyimpan hasil dalam variabel untuk digunakan di file HTML
$donate_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $donate_data[] = $row;
    }
}

// Menutup koneksi
mysqli_close($conn_donate);

// Mengembalikan data sebagai array
return $donate_data;
?>
