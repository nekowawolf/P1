<?php
// Menghubungkan ke database
require 'koneksi_feedback.php';

$id = $_GET['id'];
$delete_sql = "DELETE FROM feedback WHERE id=$id";

if (mysqli_query($conn_feedback, $delete_sql)) {
    header("Location: h_feedback.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn_feedback);
}

mysqli_close($conn_feedback);
?>
