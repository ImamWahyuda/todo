<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi ToDo List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Aplikasi ToDo List</h1>
    <form method="POST" action="add_task.php">
        <input type="text" name="task" placeholder="Tambahkan tugas baru">
        <input type="submit" class="submit-button" value="Tambah">
    </form>
    
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Tugas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'config.php';

        $sql = "SELECT * FROM tasks";
        $result = mysqli_query($conn, $sql);
        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td class='" . ($row['is_completed'] ? 'completed-task' : '') . "'>" . $row['task'] . "</td>"; // Tambahkan kelas completed-task jika tugas sudah selesai
            echo "<td>";
            if ($row['is_completed']) {
                echo "Selesai";
            } else {
                echo "Belum Selesai";
            }
            echo "</td>";
            echo "<td>";
            echo "<a class='edit-button' href='edit_task.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a class='delete-button' href='delete_task.php?id=" . $row['id'] . "'>Hapus</a> | ";
            echo "<a class='complete-button' href='complete_task.php?id=" . $row['id'] . "&status=" . ($row['is_completed'] ? '0' : '1') . "'>" . ($row['is_completed'] ? 'Batal Selesai' : 'Tandai Selesai') . "</a>"; // Tambahkan tombol "Batal Selesai"
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
