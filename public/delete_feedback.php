<?php
// Menghubungkan ke database
require 'koneksi_web3donate.php';

$id = $_GET['id'];
$delete_sql = "DELETE FROM feedback WHERE id=$id";

if (mysqli_query($conn, $delete_sql)) {
    header("Location: tb_feedback.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
