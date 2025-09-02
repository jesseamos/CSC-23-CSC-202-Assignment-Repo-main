<?php
// Database connection
$host = "localhost";
$user = "root";   // change if your DB user is different
$pass = "";
$dbname = "school_db";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if (isset($_POST['register'])) {
    $fullname   = trim($_POST['fullname']);
    $email      = trim($_POST['email']);
    $department = trim($_POST['department']);
    $matric     = trim($_POST['matric']);

    // Validate
    if (empty($fullname) || empty($email) || empty($department) || empty($matric)) {
        die("All fields are required!");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO student_records (fullname, email, department, matric) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $department, $matric);

    if ($stmt->execute()) {
        echo "Student registered successfully! <a href='view.php'>View Students</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
