<!-- manage_users.php -->
<?php require 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/manage_users.css">
    <title>Manage Users</title>
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
    <h1>Manage Users</h1>
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT Users.UserID, FullName, Email, RoleName FROM Users INNER JOIN Roles ON Users.RoleID = Roles.RoleID");
            while ($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <td>{$row['FullName']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['RoleName']}</td>
                        <td>
                            <a href='edit_user.php?userid={$row['UserID']}'>Edit</a>
                            <a href='delete_user.php?userid={$row['UserID']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
                        </td>
                    </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
