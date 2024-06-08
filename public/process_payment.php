<?php
require 'koneksi_payment.php'; // Mengimpor koneksi database
require 'fetch_donate.php'; // Mengimpor data donasi
require 'fetch_crypto.php'; // Mengimpor data crypto

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $donate_id = isset($_POST['donate_id']) ? $_POST['donate_id'] : null;
    $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : null;
    $crypto_id = isset($_POST['crypto']) ? $_POST['crypto'] : null;
    $transaction_proof = isset($_POST['tx']) ? $_POST['tx'] : null;
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $amount = isset($_POST['amount']) ? $_POST['amount'] : null;

    // Mendapatkan nama donasi dan nama crypto dari ID
    $donate_name = '';
    foreach ($donate_data as $donate) {
        if ($donate['id'] == $donate_id) {
            $donate_name = $donate['name'];
            break;
        }
    }

    $crypto_name = '';
    foreach ($crypto_data as $crypto) {
        if ($crypto['id'] == $crypto_id) {
            $crypto_name = $crypto['name'];
            break;
        }
    }

    // Validasi data
    if ($donate_name && $user_email && $crypto_name && $transaction_proof && $amount) {
        // Mempersiapkan pernyataan SQL untuk menyimpan data pembayaran
        $stmt = $conn_payment->prepare("INSERT INTO payments (donate_name, user_email, crypto_name, transaction_proof, message, amount) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssd", $donate_name, $user_email, $crypto_name, $transaction_proof, $message, $amount);

        // Mengeksekusi pernyataan dan memeriksa apakah data berhasil disimpan
        if ($stmt->execute()) {
            echo "Payment successfully recorded.";
            // Redirect ke halaman riwayat donasi atau halaman lain yang diinginkan
            header("Location: payment_waiting.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Menutup pernyataan
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}

// Menutup koneksi
$conn_payment->close();
?>