<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web3donate | Admin</title>
    <link rel="shortcut icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
    .chart-container {
        width: 70%;  /* Tentukan lebar relatif dari container chart */
        margin: 0 auto;  /* Center alignment */
    }
    #cryptoChart {
        width: 300%;  /* Sesuaikan lebar dengan container */
        height: 400px;  /* Tinggi chart sesuai keinginan */
    }
</style>
</head>
<body class="h-screen flex">

    <!-- Sidebar -->
    <div class="fixed top-0 left-0 w-64 bg-blue-900 text-white h-full p-4">
        <img src="img/logo.png" class="w-40 h-40 mx-auto" alt="Logo">
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
    <div class="flex-1 ml-64 h-full overflow-y-auto p-10">
        <h1 class="text-3xl font-bold mb-10">Data Report</h1>
        
        <!-- Form untuk memilih tanggal -->
        <div class="flex justify-end mb-4 space-x-2">
            <form id="date_form" action="" method="get" class="flex space-x-2">
                <input type="date" id="date_selected_date" name="selected_date" class="border p-2 rounded" value="<?php echo htmlspecialchars($_GET['selected_date'] ?? date('Y-m-d')); ?>">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="setDateRange()">Select Date</button>
                <input type="hidden" id="start_date" name="start_date">
                <input type="hidden" id="end_date" name="end_date">
            </form>
            <form id="date_form" action="" method="get" class="flex space-x-2">
                <input type="month" id="month_selected_date" name="selected_month" class="border p-2 rounded" value="<?php echo htmlspecialchars($_GET['selected_month'] ?? date('Y-m-d')); ?>">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="setMonthRange()">Select Month</button>
                <input type="hidden" id="start_date" name="start_date">
                <input type="hidden" id="end_date" name="end_date">
            </form>
        </div>

        <!-- Tabel Data Report -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full min-w-max text-sm text-left text-black-500 border">
                <thead class="text-center text-xs text-black-700 uppercase bg-gray-50 border">
                    <tr>
                        <th scope="col" class="px-6 py-3 border">Email</th>
                        <th scope="col" class="px-6 py-3 border">Donation Name</th>
                        <th scope="col" class="px-6 py-3 border">Amount</th>
                        <th scope="col" class="px-6 py-3 border">Payment</th>
                        <th scope="col" class="px-6 py-3 border">Message</th>
                        <th scope="col" class="px-6 py-3 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'fetch_payment.php';

                    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
                    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;

                    foreach ($payment_data as $row) {
                        $row_date = date('Y-m-d', strtotime($row['created_at']));
                        if ($start_date && $end_date) {
                            if ($row_date < $start_date || $row_date > $end_date) {
                                continue;
                            }
                        }
                        ?>
                        <tr class="text-center border">
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($row['user_email']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($row['donate_name']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($row['Amount']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($row['crypto_name']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($row['message']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($row['STATUS']); ?></td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h1 class="text-3xl mt-12 font-bold mb-10">Crypto Usage</h1>
        <div class="chart-container mt-10">
            <canvas id="cryptoChart" class="chart"></canvas>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function setMonthRange() {
            const dateInput = document.getElementById('month_selected_date');
            const selectedDate = new Date(dateInput.value);

            const startOfMonth = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), 1);
            const endOfMonth = new Date(selectedDate.getFullYear(), selectedDate.getMonth() + 1, 0);

            const startDate = startOfMonth.toISOString().split('T')[0];
            const endDate = endOfMonth.toISOString().split('T')[0];

            document.getElementById('start_date').value = startDate;
            document.getElementById('end_date').value = endDate;

            document.getElementById('date_form').submit();
        }

        function setDateRange() {
            const dateInput = document.getElementById('date_selected_date');
            const selectedDate = dateInput.value;

            document.getElementById('start_date').value = selectedDate;
            document.getElementById('end_date').value = selectedDate;

            document.getElementById('date_form').submit();
        }

        // Fungsi untuk memuat data dan membuat chart
        function loadCryptoChart() {
    fetch('fetch_crypto_usage.php')
        .then(response => response.json())
        .then(data => {
            const cryptoNames = data.map(item => item.crypto_name);
            const usageCounts = data.map(item => item.usage_count);

            const ctx = document.getElementById('cryptoChart').getContext('2d');
            const cryptoChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: cryptoNames,
                    datasets: [{
                        label: 'Usage Count',
                        data: usageCounts,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(231, 233, 237, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(231, 233, 237, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,  // Memungkinkan penyesuaian rasio aspek
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: 10  // Ukuran font lebih kecil
                                }
                            }
                        }
                    }
                }
            });
        });
}


        // Muat chart setelah halaman selesai di-load
        window.onload = loadCryptoChart;
    </script>

</body>
</html>
