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
                <a href="tb_user.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Users</a>
                <a href="tb_crypto.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Crypto</a>
                <a href="tb_feedback.php" class="block py-2.5 px-4 rounded hover:bg-blue-700">Feedback</a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10">   
            <h1 class="text-3xl font-bold mb-10">Crypto</h1>
             <!-- Content goes here -->
             <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-black-500">
                    <thead class="text-xs text-black-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 border">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 border">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3 border">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Menghubungkan ke database dan mengambil data feedback
                        $crypto_data = require 'fetch_crypto.php';
                        
                        foreach ($crypto_data as $row):
                        ?>
                        <tr class="text-center">
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($row['name']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($row['address']); ?></td>
                            <td class="border px-4 py-2">
                                <a class="text-blue-600 hover:text-blue-800" href="edit_crypto.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
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
