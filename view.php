<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "school_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM student_records WHERE id=$id");
    header("Location: view.php");
}

// Fetch Students
$result = $conn->query("SELECT * FROM student_records");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registered Students</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Matric No</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['fullname']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['department']) ?></td>
                    <td><?= htmlspecialchars($row['matric']) ?></td>
                    <td><a class="delete-btn" href="view.php?delete=<?= $row['id'] ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <a href="index.php" class="back-btn">Register New Student</a>
    </div>
</body>
</html>
