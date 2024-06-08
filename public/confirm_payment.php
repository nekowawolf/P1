<?php


// Memeriksa apakah ada `payment_id` yang diterima melalui POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment_id'])) {
    $payment_id = $_POST['payment_id'];

    // Menghubungkan ke database
    require 'koneksi_payment.php';

    // Mengubah status pembayaran menjadi 'confirmed'
    $stmt = $conn_payment->prepare("UPDATE payments SET status = 'confirmed' WHERE id = ?");
    $stmt->bind_param("i", $payment_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Payment ID $payment_id has been successfully confirmed.";
    } else {
        $_SESSION['error'] = "Error confirming payment ID $payment_id: " . $stmt->error;
    }

    // Menutup pernyataan dan koneksi
    $stmt->close();
    $conn_payment->close();

    // Redirect ke halaman admin
    header("Location: tb_user.php");
    exit();
} else {
    // Jika `payment_id` tidak ada, redirect ke halaman admin dengan pesan error
    $_SESSION['error'] = "Invalid request.";
    header("Location: tb_user.php");
    exit();
}
?>