<?php
// Menghubungkan ke database
require 'koneksi_payment.php';

// Mengambil data dari database
$query_sql = "SELECT * FROM payments WHERE STATUS = 'confirmed'";

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;

if ($start_date && $end_date) {
    $query_sql .= " AND DATE(created_at) BETWEEN '$start_date' AND '$end_date'";
}

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
