<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web3donate | Admin</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-blue-900 text-white p-4 z-50">
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
        <div class="flex-1 ml-64 p-10 overflow-auto">
            <h1 class="text-3xl font-bold mb-10">Users Donate</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full min-w-max text-xs text-left rtl:text-right text-black-500 border">
                    <thead class="text-center text-xs text-black-700 uppercase bg-gray-50 border">
                        <tr>
                            <th scope="col" class="px-2 py-1 border">Email</th>
                            <th scope="col" class="px-2 py-1 border">Donation Name</th>
                            <th scope="col" class="px-2 py-1 border">Payment</th>
                            <th scope="col" class="px-2 py-1 border">Tx</th>
                            <th scope="col" class="px-2 py-1 border">Message</th>
                            <th scope="col" class="px-2 py-1 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Menghubungkan ke database dan mengambil data pembayaran
                        $payment_data = require 'fetch_payment.php';

                        foreach ($payment_data as $row):
                            $form_id = "paymentForm" . htmlspecialchars($row['id']);
                            ?>
                            <tr class="text-center border">
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['user_email']); ?></td>
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['donate_name']); ?></td>
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['crypto_name']); ?></td>
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['transaction_proof']); ?></td>
                                <td class="border px-4 py-2"><?php echo htmlspecialchars($row['message']); ?></td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-between">
                                        <form id="<?php echo $form_id; ?>" action="confirm_payment.php" method="post">
                                            <input type="hidden" name="payment_id"
                                                value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <button type="button" class="bg-green-500 text-white px-4 py-2 rounded"
                                                onclick="confirmSubmission('<?php echo $form_id; ?>')">Confirm</button>
                                        </form>
                                        <form action="delete_payment.php" method="post">
                                            <input type="hidden" name="payment_id"
                                                value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <button type="submit"
                                                class="bg-blue-500 ml-3 text-white px-4 py-2 rounded">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmSubmission(formId) {
            var confirmation = confirm("Are you sure you want to confirm this?");
            if (confirmation) {
                document.getElementById(formId).submit();
            }
        }
    </script>
</body>

</html>
