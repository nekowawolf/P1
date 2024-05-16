<?php
// Menghubungkan ke database
require 'koneksi_feedback.php';

$id = $_GET['id'];
$query_sql = "SELECT * FROM feedback WHERE id=$id";
$result = mysqli_query($conn_feedback, $query_sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $update_sql = "UPDATE feedback SET email='$email', subject='$subject', message='$message' WHERE id=$id";

    if (mysqli_query($conn_feedback, $update_sql)) {
        header("Location: tb_feedback.php");
        exit(); // tambahkan exit untuk menghentikan eksekusi skrip setelah mengarahkan ke halaman tb_feedback.php
    } else {
        echo "Error updating record: " . mysqli_error($conn_feedback);
    }
}

mysqli_close($conn_feedback);
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
<body class="bg-gray-100 py-10 px-5">
    <div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-lg mx-auto">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Edit Feedback</h2>
            <p class="text-gray-700 mb-6 text-center">Update database Web3donate</p>
            <form method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                    <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="subject">Subject</label>
                    <input name="subject" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subject" type="text" placeholder="Subject" value="<?php echo $row['subject']; ?>" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="message">Message</label>
                    <textarea name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" rows="4" placeholder="Message" required><?php echo $row['message']; ?></textarea>
                </div>

                <div class="flex justify-center items-center mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
