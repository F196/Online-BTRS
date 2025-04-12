<?php require 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bus_schedule_management.css">
    <title>Bus Schedule Management</title>
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
    <h1>Manage Bus Schedules</h1>

    <!-- Form for Adding New Schedules -->
    <form method="POST" action="add_schedule.php">
        <!-- Departure Location -->
        <label for="departure">Departure Location:</label>
        <select id="departure" name="departure" required>
            <option value="">Select a Location</option>
            <?php
            // Fetch all locations from the Locations table
            $result = $conn->query("SELECT LocationName FROM Locations ORDER BY LocationName");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['LocationName']}'>{$row['LocationName']}</option>";
            }
            ?>
        </select>

        <!-- Arrival Location -->
        <label for="arrival">Arrival Location:</label>
        <select id="arrival" name="arrival" required>
            <option value="">Select a Location</option>
            <?php
            // Fetch all locations again for the arrival combo box
            $result = $conn->query("SELECT LocationName FROM Locations ORDER BY LocationName");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['LocationName']}'>{$row['LocationName']}</option>";
            }
            ?>
        </select>

        <!-- Departure Date and Time -->
        <label for="departure_date">Departure Date:</label>
        <input type="date" id="departure_date" name="departure_date" required>
        <label for="departure_time">Departure Time:</label>
        <input type="time" id="departure_time" name="departure_time" required>

        <!-- Arrival Date and Time -->
        <label for="arrival_date">Arrival Date:</label>
        <input type="date" id="arrival_date" name="arrival_date" required>
        <label for="arrival_time">Arrival Time:</label>
        <input type="time" id="arrival_time" name="arrival_time" required>

        <!-- Bus Selection -->
        <label for="bus_id">Select Bus:</label>
        <select id="bus_id" name="bus_id" required>
            <?php
            $result = $conn->query("SELECT BusID, BusNumber FROM Buses ORDER BY BusNumber");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['BusID']}'>{$row['BusNumber']}</option>";
            }
            ?>
        </select>

        <button type="submit">Add Schedule</button>
    </form>

    <!-- Display Existing Schedules -->
    <h2>Existing Schedules</h2>
    <table>
        <thead>
            <tr>
                <th>Departure Location</th>
                <th>Arrival Location</th>
                <th>Departure Date & Time</th>
                <th>Arrival Date & Time</th>
                <th>Bus Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch and display existing schedules from the database
            $query = "SELECT Routes.RouteID, Routes.DepartureLocation, Routes.ArrivalLocation, 
                      Routes.DepartureTime, Routes.ArrivalTime, Buses.BusNumber 
                      FROM Routes 
                      INNER JOIN Buses ON Routes.BusID = Buses.BusID 
                      ORDER BY Routes.DepartureTime";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['DepartureLocation']}</td>
                        <td>{$row['ArrivalLocation']}</td>
                        <td>{$row['DepartureTime']}</td>
                        <td>{$row['ArrivalTime']}</td>
                        <td>{$row['BusNumber']}</td>
                        <td>
                            <a href='edit_schedule.php?routeid={$row['RouteID']}'>Edit</a> |
                            <a href='delete_schedule.php?routeid={$row['RouteID']}' onclick=\"return confirm('Are you sure you want to delete this schedule?');\">Delete</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
