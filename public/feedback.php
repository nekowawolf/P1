<?php
// Menghubungkan ke database
require 'koneksi_feedback.php';

// Mengambil data dari form
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Menyusun query untuk menyimpan data ke tabel feedback
$query_sql = "INSERT INTO feedback (email, subject, message) VALUES ('$email', '$subject', '$message')";

// Menjalankan query
if (mysqli_query($conn_feedback, $query_sql)) {
    header("Location: feedback.html");
} else {
    echo "Error: " . $query_sql . "<br>" . mysqli_error($conn_feedback);
}

// Menutup koneksi
mysqli_close($conn_feedback);
?>
