<?php
 
require 'db_connection.php'; 
session_start();

$error = ""; // Variable to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        // Fetch user details securely
        $sql = "SELECT UserID, RoleID, PasswordHash FROM Users WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['PasswordHash'])) {
            $_SESSION['UserID'] = $user['UserID'];
            $_SESSION['RoleID'] = $user['RoleID'];

            // Redirect based on role
            if ($user['RoleID'] == 1) {
                header("Location: admin_dashboard.php"); // Admin
            } else {
                header("Location: home.php"); // Passenger
            }
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    
  
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST"><h1>Login</h1>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required><br>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required><br>

        <button type="submit">Log In</button>
        
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p>Got to the<a href="../index.html"> home </a>page</p>
    </form>
    

</body>
</html>
