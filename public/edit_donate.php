<?php
include 'koneksi_donate.php';

// Mendapatkan ID dari parameter URL
$id = $_GET['id'];

// Mengambil data donasi berdasarkan ID
$query_sql = "SELECT * FROM donate WHERE id = $id";
$result = mysqli_query($conn_donate, $query_sql);
$donation = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $end_date = $_POST['end_date'];

    // Memperbarui data di database
    $update_sql = "UPDATE donate SET name = '$name', description = '$description', image_url = '$image_url', end_date = '$end_date' WHERE id = $id";
    if (mysqli_query($conn_donate, $update_sql)) {
        header("Location: tb_donate.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn_donate);
    }
}

mysqli_close($conn_donate);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web3donate | Edit</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Edit Donation</h1>

        <!-- Form to edit donation -->
        <form action="" method="post" class="mb-6 p-6 bg-white shadow-md rounded">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Name:</label>
                <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded"
                    value="<?php echo htmlspecialchars($donation['name']); ?>" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold">Description:</label>
                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded"
                    required><?php echo htmlspecialchars($donation['description']); ?></textarea>
            </div>
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700 font-bold">Image URL:</label>
                <input type="text" id="image_url" name="image_url" class="mt-1 p-2 w-full border rounded"
                    value="<?php echo htmlspecialchars($donation['image_url']); ?>" required>
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 font-bold">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="mt-1 p-2 w-full border rounded"
                    value="<?php echo htmlspecialchars($donation['end_date']); ?>" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Donation</button>
        </form>
    </div>
</body>

</html>