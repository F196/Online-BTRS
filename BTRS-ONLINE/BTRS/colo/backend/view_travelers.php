<?php
require 'db_connection.php'; // Include the database connection

// Fetch routes to populate the dropdown
$routes = $conn->query("SELECT RouteID, DepartureLocation, ArrivalLocation, DepartureTime FROM Routes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/view_travelers.css">
    <title>View Travelers</title>
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

<h1>View Travelers</h1>

<!-- Route Selection Form -->
<form method="POST" action="">
    <label for="route_id">Select Route:</label>
    <select id="route_id" name="route_id" required>
        <option value="">Select a Route</option>
        <?php
        // Populate the dropdown with route options
        if ($routes && $routes->num_rows > 0) {
            while ($route = $routes->fetch_assoc()) {
                echo "<option value='{$route['RouteID']}'>{$route['DepartureLocation']} to {$route['ArrivalLocation']} - {$route['DepartureTime']}</option>";
            }
        } else {
            echo "<option value=''>No routes available</option>";
        }
        ?>
    </select>
    <button type="submit">View Travelers</button>
</form>

<?php
// Handle route selection and fetch travelers
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['route_id'])) {
    $route_id = $_POST['route_id'];

    // Query to fetch all travelers for the selected route
    $query = $conn->prepare("
        SELECT Users.FullName, Users.Email, Reservations.SeatNumber, Reservations.ReservationDate
        FROM Reservations
        INNER JOIN Users ON Reservations.UserID = Users.UserID
        WHERE Reservations.RouteID = ?
        ORDER BY Reservations.SeatNumber
    ");
    $query->bind_param("i", $route_id);
    $query->execute();
    $result = $query->get_result();

    if ($result && $result->num_rows > 0) {
        echo "<h2>Travelers for the Selected Route</h2>";
        echo "<table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Seat Number</th>
                        <th>Reservation Date</th>
                    </tr>
                </thead>
                <tbody>";

        // Loop through the results and display each traveler
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['FullName']}</td>
                    <td>{$row['Email']}</td>
                    <td>{$row['SeatNumber']}</td>
                    <td>{$row['ReservationDate']}</td>
                  </tr>";
        }

        echo "</tbody>
              </table>";
    } else {
        echo "<p>No travelers found for the selected route.</p>";
    }
}
?>
</body>
</html>
