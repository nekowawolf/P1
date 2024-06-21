<?php
// Menghubungkan ke database
require 'koneksi_web3donate.php';

// Query untuk mengambil data leaderboard
$query = "SELECT email, donation_count FROM leaderboard ORDER BY donation_count DESC"; // Mengurutkan berdasarkan total_donasi dari yang tertinggi

$result = mysqli_query($conn, $query);

// Menyimpan hasil dalam array
$leaderboard_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $leaderboard_data[] = $row;
    }
}

// Menutup koneksi
mysqli_close($conn);

// Mengembalikan data sebagai array
return $leaderboard_data;
?>
