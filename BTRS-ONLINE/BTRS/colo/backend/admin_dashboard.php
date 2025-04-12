<?php require 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin_dashboard.css">
    <title>Admin Dashboard</title>
    <script>
        // Function to toggle the edit form's visibility
        function toggleEditForm() {
            const editForm = document.getElementById('edit-form-container');
            editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'block' : 'none';
        }
    </script>
</head>
<body>
<div class="dashboard-links">
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="bus_schedule_management.php">Manage Bus Schedules</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="bus_management.php">Add New Buses</a>
        <a href="feedback_management.php">Manage Feedback</a>
        <a href="maintenance_logs.php">Manage Maintenance Logs</a>
        <a href="view_travelers.php">View Travelers</a>
    </div>
    <h1>Welcome, Admin!</h1>

    <!-- Edit Details Button -->
    <button onclick="toggleEditForm()">Edit My Details</button>

    <!-- Edit Form (Hidden by Default) -->
    <div id="edit-form-container" style="display: none; margin-top: 20px;">
        <?php
        // Fetch admin details (assumes admin is identified by RoleID = 1)
        $stmt = $conn->prepare("SELECT FullName, Email FROM Users WHERE RoleID = 1 LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();
        $stmt->close();
        ?>

        <form method="POST">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($admin['FullName']); ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin['Email']); ?>" required><br><br>

            <label for="old_password">Current Password:</label>
            <input type="password" id="old_password" name="old_password" placeholder="Enter current password" required><br><br>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password"><br><br>

            <button type="submit">Save Changes</button>
        </form>
    </div>

    <!-- Update Admin Details in the Backend -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];

        // Fetch the current password hash for the admin
        $stmt = $conn->prepare("SELECT PasswordHash FROM Users WHERE RoleID = 1 LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();
        $stmt->close();

        if (!password_verify($old_password, $admin['PasswordHash'])) {
            echo "<p style='color: red;'>Error: Current password is incorrect!</p>";
        } else {
            if (!empty($new_password)) {
                // Hash the new password before storing it in the database
                $passwordHash = password_hash($new_password, PASSWORD_DEFAULT);

                // Update details with the new password
                $stmt = $conn->prepare("UPDATE Users SET FullName = ?, Email = ?, PasswordHash = ? WHERE RoleID = 1");
                $stmt->bind_param("sss", $fullname, $email, $passwordHash);
            } else {
                // Update details without changing the password
                $stmt = $conn->prepare("UPDATE Users SET FullName = ?, Email = ? WHERE RoleID = 1");
                $stmt->bind_param("ss", $fullname, $email);
            }

            if ($stmt->execute()) {
                echo "<p style='color: green;'>Details updated successfully!</p>";
            } else {
                echo "<p style='color: red;'>Error updating details: " . $conn->error . "</p>";
            }

            $stmt->close();
        }
    }
    ?>

    <a href="logout.php" class="logout">Logout</a>
</body>
</html>
