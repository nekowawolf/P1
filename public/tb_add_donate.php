<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web3donate | Admin</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-900 text-white p-4">
            <img src="img/logo.png" class="w-40 h-40 mx-auto" alt="">
            <h2 class="text-2xl font-semibold mb-4 text-center">Web3donate Dashboard</h2>
            <nav>
                <a href="tb_donate.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Donate</a>
                <a href="tb_add_donate.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Add Donate</a>
                <a href="tb_user.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Users Donate</a>
                <a href="tb_data.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Data Report</a>
                <a href="tb_crypto.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Crypto</a>
                <a href="tb_feedback.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Feedback</a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-10">Add Donate</h1>
            <!-- Content goes here -->


            <!-- Form to add/edit donation -->
            <form action="add_donate.php" method="post" enctype="multipart/form-data"
                class="mb-6 p-6 bg-white shadow-md rounded">
                <input type="hidden" name="id" id="donation-id">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold">Name :</label>
                    <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold">Description :</label>
                    <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded"
                        required></textarea>
                </div>
                <div class="mb-4">
                    <label for="image_url" class="block text-gray-700 font-bold">Image URL :</label>
                    <input type="text" id="image_url" name="image_url" class="mt-1 p-2 w-full border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="end_date" class="block text-gray-700 font-bold">End Date :</label>
                    <input type="date" id="end_date" name="end_date" class="mt-1 p-2 w-full border rounded" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Donation</button>
            </form>




        </div>
    </div>
</body>

</html>