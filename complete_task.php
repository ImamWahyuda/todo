<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    if ($status == 1) {
        $sql = "UPDATE tasks SET is_completed=1 WHERE id=$id";
    } else {
        $sql = "UPDATE tasks SET is_completed=0 WHERE id=$id";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal mengubah status tugas: " . mysqli_error($conn);
    }
}
?>
