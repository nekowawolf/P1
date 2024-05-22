<?php
include 'koneksi_donate.php';

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$image_url = $_POST['image_url'];
$end_date = $_POST['end_date'];

if ($id) {
    // Update donation
    $sql = "UPDATE donate SET name='$name', description='$description', image_url='$image_url', end_date='$end_date' WHERE id=$id";
} else {
    // Insert new donation
    $sql = "INSERT INTO donate (name, description, image_url, end_date) VALUES ('$name', '$description', '$image_url', '$end_date')";
}

if ($conn_donate->query($sql) === TRUE) {
    header("Location: tb_add_donate.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn_donate->error;
}

$conn_donate->close();
?>