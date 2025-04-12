<?php
// signup.php
require 'db_connection.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure the password
    $role = 2; // Default role for passengers

    // Insert user into database
    $sql = "INSERT INTO Users (RoleID, FullName, Email, PasswordHash) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $role, $fullname, $email, $password);
    
    if ($stmt->execute()) {
        echo "Signup successful! Please log in.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="../styles/signup.css">
</head>
<body>
    
    <form method="POST"><h1>Signup</h1>
        <label>Full Name:</label>
        <input type="text" name="fullname" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Sign Up</button>
        <p>Already have an account? <a href="login.php">Login</a></p>

    </form>
</body>
</html>
