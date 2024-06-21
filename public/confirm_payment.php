<?php
session_start(); // Memulai sesi untuk menyimpan pesan

// Memeriksa apakah ada `payment_id` yang diterima melalui POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment_id'])) {
    $payment_id = $_POST['payment_id'];

    // Pastikan `payment_id` adalah angka
    if (!is_numeric($payment_id)) {
        $_SESSION['error'] = "Invalid payment ID.";
        header("Location: tb_user.php");
        exit();
    }

    // Menghubungkan ke database payments
    require 'koneksi_payment.php';

    // Mengubah status pembayaran menjadi 'confirmed'
    $stmt = $conn_payment->prepare("UPDATE payments SET status = 'confirmed' WHERE id = ?");
    $stmt->bind_param("i", $payment_id);

    if ($stmt->execute()) {
        // Mendapatkan email pengguna
        $stmt_user = $conn_payment->prepare("SELECT user_email FROM payments WHERE id = ?");
        $stmt_user->bind_param("i", $payment_id);
        $stmt_user->execute();
        $stmt_user->bind_result($user_email);
        $stmt_user->fetch();
        $stmt_user->close();

        // Memeriksa koneksi ke database web3donate
        require 'koneksi_web3donate.php';

        // Periksa apakah pengguna sudah ada di leaderboard
        $query_check = "SELECT * FROM leaderboard WHERE email = ?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param('s', $user_email);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Pengguna sudah ada, tambahkan jumlah donasi
            $query_update = "UPDATE leaderboard SET donation_count = donation_count + 1 WHERE email = ?";
            $stmt_update = $conn->prepare($query_update);
            $stmt_update->bind_param('s', $user_email);
            $stmt_update->execute();
            $stmt_update->close();
        } else {
            // Pengguna belum ada, tambahkan entri baru
            $query_insert = "INSERT INTO leaderboard (email, donation_count) VALUES (?, 1)";
            $stmt_insert = $conn->prepare($query_insert);
            $stmt_insert->bind_param('s', $user_email);
            $stmt_insert->execute();
            $stmt_insert->close();
        }

        $_SESSION['message'] = "Payment ID $payment_id has been successfully confirmed.";
    } else {
        $_SESSION['error'] = "Error confirming payment ID $payment_id: " . $stmt->error;
    }

    // Menutup pernyataan dan koneksi
    $stmt->close();
    $conn_payment->close();
    $conn->close();

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
