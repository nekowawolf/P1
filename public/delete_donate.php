<?php
// Menghubungkan ke database
require 'koneksi_donate.php';

$id = $_GET['id'];
$delete_sql = "DELETE FROM donate WHERE id=$id";

if (mysqli_query($conn_donate, $delete_sql)) {
    header("Location: tb_donate.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn_donate);
}

mysqli_close($conn_donate);
?>
