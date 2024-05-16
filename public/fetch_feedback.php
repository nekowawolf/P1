<?php
// Menghubungkan ke database
require 'koneksi_feedback.php';

// Mengambil data dari database
$query_sql = "SELECT * FROM feedback";
$result = mysqli_query($conn_feedback, $query_sql);

// Menyimpan hasil dalam variabel untuk digunakan di file HTML
$feedback_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $feedback_data[] = $row;
    }
}

// Menutup koneksi
mysqli_close($conn_feedback);

// Mengembalikan data sebagai array
return $feedback_data;
?>
