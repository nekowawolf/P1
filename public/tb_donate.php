<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web3donate | Admin</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" />
</head>

<body class="h-screen">

    <div class="flex h-full">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-900 text-white p-4 flex flex-col min-h-full">
            <img src="img/logo.png" class="w-40 h-40 mx-auto" alt="">
            <h2 class="text-2xl font-semibold mb-4 text-center">Web3donate Dashboard</h2>
            <nav class="flex-grow">
                <a href="tb_donate.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Donate</a>
                <a href="tb_add_donate.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Add Donate</a>
                <a href="tb_user.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Users Donate</a>
                <a href="tb_data.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Data Report</a>
                <a href="tb_crypto.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Crypto</a>
                <a href="tb_feedback.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Feedback</a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-y-auto">
            <h1 class="text-3xl font-bold mb-10">Donate</h1>
            <!-- Content goes here -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-black-500 border">
                    <thead class="text-center text-xs text-black-700 uppercase bg-gray-50 border">
                        <tr>
                            <th scope="col" class="px-6 py-3 border">Name</th>
                            <th scope="col" class="px-6 py-3 border">Description</th>
                            <th scope="col" class="px-6 py-3 border">Image</th>
                            <th scope="col" class="px-6 py-3 border">End Date</th>
                            <th scope="col" class="px-6 py-3 border">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        // Menghubungkan ke database dan mengambil data feedback
                        require 'fetch_donate.php';

                        foreach ($donate_data as $row):
                            ?>
                            <tr class="text-center border">
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['description']); ?></td>
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['image_url']); ?></td>
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['end_date']); ?></td>
                                <td class="border px-4 py-2">
                                    <a class="text-blue-600 hover:text-blue-800"
                                        href="edit_donate.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
                                    <a class="text-blue-600 hover:text-blue-800"
                                        href="delete_donate.php?id=<?php echo htmlspecialchars($row['id']); ?>"
                                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
