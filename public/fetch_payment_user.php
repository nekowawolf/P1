<?php
require 'koneksi_payment.php'; // Pastikan Anda memiliki koneksi ke database yang tepat

$query_sql = "SELECT * FROM payments";

// Ambil nilai dari GET parameters
$selected_date = isset($_GET['selected_date']) ? $_GET['selected_date'] : null;
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;

if ($selected_date) {
    // Filter untuk satu tanggal
    $query_sql .= " WHERE DATE(created_at) = '$selected_date'";
} elseif ($start_date && $end_date) {
    // Filter untuk rentang tanggal
    $query_sql .= " WHERE DATE(created_at) BETWEEN '$start_date' AND '$end_date'";
}

$result = mysqli_query($conn_payment, $query_sql);

$payment_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $payment_data[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($conn_payment);
}

mysqli_close($conn_payment);

return $payment_data;
?>
