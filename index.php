<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Student Registration Form</h2>
        <form action=process.php method="POST">
            <label>Full Name</label>
            <input type="text" name="fullname" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Department</label>
            <input type="text" name="department" required>

            <label>Matric Number</label>
            <input type="text" name="matric" required>

            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>
