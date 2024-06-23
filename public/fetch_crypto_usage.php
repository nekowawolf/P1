<?php
// Menghubungkan ke kedua database
require 'koneksi_payment.php';
require 'koneksi_web3donate.php';

// Query untuk mendapatkan data penggunaan cryptocurrency
$query = "
    SELECT p.crypto_name, COUNT(*) as usage_count
    FROM db_payment.payments p
    JOIN web3donate.leaderboard l ON p.user_email = l.email
    WHERE p.status = 'confirmed'
    GROUP BY p.crypto_name
    ORDER BY usage_count DESC
";

$result = $conn_payment->query($query);

// Menyimpan hasil dalam array
$crypto_usage = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $crypto_usage[] = $row;
    }
}

// Menutup koneksi
$conn_payment->close();
$conn->close();

// Mengembalikan data sebagai JSON untuk digunakan dalam chart
header('Content-Type: application/json');
echo json_encode($crypto_usage);
?>
