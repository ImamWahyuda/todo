<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];

    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal menambahkan tugas: " . mysqli_error($conn);
    }
}
?>
