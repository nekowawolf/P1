<?php
require 'koneksi_payment.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_id = $_POST['payment_id'];
    $action = $_POST['action'];

    $query_sql = "UPDATE payment SET action = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn_payment, $query_sql);
    mysqli_stmt_bind_param($stmt, 'si', $action, $payment_id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn_payment);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn_payment);
}
?>
