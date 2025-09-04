<?php require 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bus_management.css">
    <title>Bus Management</title>
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
    <h1>Manage Buses</h1>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bus_number = $_POST['bus_number'];
        $capacity = intval($_POST['capacity']);
        $maintenance_status = $_POST['maintenance_status'];

    
        $stmt = $conn->prepare("SELECT BusNumber FROM Buses WHERE BusNumber = ?");
        $stmt->bind_param("s", $bus_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<p style='color: red;'>Error: Bus number already exists!</p>";
        } else {
          
            $stmt->close();
            $stmt = $conn->prepare("INSERT INTO Buses (BusNumber, Capacity, MaintenanceStatus) VALUES (?, ?, ?)");
            $stmt->bind_param("sis", $bus_number, $capacity, $maintenance_status);

            if ($stmt->execute()) {
                echo "<p style='color: green;'>Bus added successfully!</p>";
            } else {
                echo "<p style='color: red;'>Error adding bus: " . $conn->error . "</p>";
            }
        }

        $stmt->close(); 
    }
    ?>

    <form method="POST">
      
        <label for="bus_number">Bus Number:</label>
        <input type="text" id="bus_number" name="bus_number" placeholder="Bus Number" required><br><br>

        
        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" placeholder="Capacity" required><br><br>

        
        <label for="maintenance_status">Maintenance Status:</label>
        <select id="maintenance_status" name="maintenance_status" required>
            <option value="">Select a Maintenance Status</option>
            <option value="Operational">Operational</option>
            <option value="Under Maintenance">Under Maintenance</option>
            <option value="Needs Repair">Needs Repair</option>
            <option value="Out of Service">Out of Service</option>
        </select><br><br>

        <button type="submit">Add Bus</button>
    </form>

    <h2>Existing Buses</h2>
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
            $result = $conn->query("SELECT BusNumber, Capacity, MaintenanceStatus FROM Buses");

            if ($result->num_rows > 0) {
                
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

