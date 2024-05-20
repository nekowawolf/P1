<?php
require 'koneksi_user.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Cek apakah username atau email sudah ada
$check_sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($result) > 0) {
    // Jika ada duplikasi, arahkan kembali ke signup.html dengan pesan error
    header("Location: signup.html?error=1");
} else {
    // Jika tidak ada duplikasi, lakukan pendaftaran
    $query_sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $query_sql)) {
        header("Location: signin.html");
    } else {
        echo "Pendaftaran Gagal : " . mysqli_error($conn);
    }
}
?>
