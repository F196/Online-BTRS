<!-- feedback_management.php -->
<?php require 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/feedback_management.css">
    <title>Feedback Management</title>
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
    <h1>Manage Feedback</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Route</th>
                <th>Feedback</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT FullName, DepartureLocation, ArrivalLocation, FeedbackText, FeedbackDate 
                                    FROM Feedback 
                                    INNER JOIN Users ON Feedback.UserID = Users.UserID 
                                    INNER JOIN Routes ON Feedback.RouteID = Routes.RouteID");
            while ($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <td>{$row['FullName']}</td>
                        <td>{$row['DepartureLocation']} - {$row['ArrivalLocation']}</td>
                        <td>{$row['FeedbackText']}</td>
                        <td>{$row['FeedbackDate']}</td>
                    </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
