<?php require 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/maintenance_logs.css">
    <title>Maintenance Logs</title>
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
    <h1>Manage Maintenance Logs</h1>

    <!-- Form to Update Maintenance Status -->
    <form method="POST" action="update_maintenance_status.php">
        <label for="bus_id">Select Bus:</label>
        <select id="bus_id" name="bus_id" required>
            <option value="">Select a Bus</option>
            <?php
            // Fetch buses from the database
            $result = $conn->query("SELECT BusID, BusNumber FROM Buses ORDER BY BusNumber");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['BusID']}'>{$row['BusNumber']}</option>";
            }
            ?>
        </select>

        <label for="maintenance_status">Maintenance Status:</label>
        <select id="maintenance_status" name="maintenance_status" required>
            <option value="">Select Status</option>
            <option value="Operational">Operational</option>
            <option value="Under Maintenance">Under Maintenance</option>
            <option value="Needs Repair">Needs Repair</option>
            <option value="Out of Service">Out of Service</option>
        </select>

        <button type="submit">Update Maintenance Status</button>
    </form>

    <h2>Current Maintenance Status</h2>
    <table>
        <thead>
            <tr>
                <th>Bus Number</th>
                <th>Capacity</th>
                <th>Maintenance Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch bus information along with maintenance status
            $query = "SELECT BusNumber, Capacity, MaintenanceStatus FROM Buses";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['BusNumber']}</td>
                            <td>{$row['Capacity']}</td>
                            <td>{$row['MaintenanceStatus']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No buses found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
