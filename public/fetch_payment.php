<?php
// Menghubungkan ke database
require 'koneksi_payment.php'; // Pastikan Anda memiliki koneksi ke database yang tepat

// Mengambil data dari database
$query_sql = "SELECT * FROM payments"; // Nama tabel harus sesuai, yaitu 'payments'
$result = mysqli_query($conn_payment, $query_sql);

// Menyimpan hasil dalam variabel untuk digunakan di file HTML
$payment_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $payment_data[] = $row;
    }
}

// Menutup koneksi
mysqli_close($conn_payment);

// Mengembalikan data sebagai array
return $payment_data;
?>
