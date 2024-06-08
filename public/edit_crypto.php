<?php
// Menghubungkan ke database
require 'koneksi_web3donate.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$query_sql = "SELECT * FROM crypto WHERE id=$id";
$result = mysqli_query($conn, $query_sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $update_sql = "UPDATE crypto SET name='$nama', address='$address' WHERE id=$id";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: tb_crypto.php");
        exit(); // tambahkan exit untuk menghentikan eksekusi skrip setelah mengarahkan ke halaman tb_crypto.php
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web3donate | Edit</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>

<body class="bg-gray-100 py-10 px-5">
    <div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-lg mx-auto">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Edit Crypto</h2>
            <p class="text-gray-700 mb-6 text-center">Update database Web3donate</p>
            <form method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
                    <input name="nama"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" type="text" placeholder="Name" value="<?php echo htmlspecialchars($row['name']); ?>"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="address">Address</label>
                    <input name="address"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="address" type="text" placeholder="Address"
                        value="<?php echo htmlspecialchars($row['address']); ?>" required>
                </div>
                <div class="flex justify-center items-center mt-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>