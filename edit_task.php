<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tasks WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Tugas tidak ditemukan: " . mysqli_error($conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $task = $_POST['task'];

    $sql = "UPDATE tasks SET task='$task' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal mengedit tugas: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
</head>
<body>
    <h1>Edit Tugas</h1>
    <form method="POST" action="edit_task.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="task" value="<?php echo $row['task']; ?>">
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
