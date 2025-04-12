<?php
require 'db_connection.php';

if (isset($_GET['routeid'])) {
    $routeid = intval($_GET['routeid']);

    // Fetch schedule details
    $stmt = $conn->prepare("SELECT * FROM Routes WHERE RouteID = ?");
    $stmt->bind_param("i", $routeid);
    $stmt->execute();
    $result = $stmt->get_result();
    $route = $result->fetch_assoc();
    $stmt->close();

    if (!$route) {
        echo "Schedule not found.";
        exit();
    }
} else {
    echo "Invalid RouteID.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $bus_id = intval($_POST['bus_id']);

    // Update the schedule in the database
    $stmt = $conn->prepare("UPDATE Routes SET DepartureLocation = ?, ArrivalLocation = ?, DepartureTime = ?, ArrivalTime = ?, BusID = ? WHERE RouteID = ?");
    $stmt->bind_param("ssssii", $departure, $arrival, $departure_time, $arrival_time, $bus_id, $routeid);

    if ($stmt->execute()) {
        echo "Schedule updated successfully.";
        header("Location: bus_schedule_management.php");
        exit();
    } else {
        echo "Error updating schedule: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <link rel="stylesheet" href="../styles/bus_schedule_management.css">
</head>
<body>
    <h1>Edit Schedule</h1>
    <form method="POST">
        <!-- Departure Location Combo Box -->
        <label for="departure">Departure Location:</label>
        <select id="departure" name="departure" required>
            <option value="">Select a Location</option>
            <?php
            // Fetch all locations for the combo box
            $result = $conn->query("SELECT LocationName FROM Locations ORDER BY LocationName");
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['LocationName'] === $route['DepartureLocation']) ? 'selected' : '';
                echo "<option value='{$row['LocationName']}' $selected>{$row['LocationName']}</option>";
            }
            ?>
        </select><br><br>

        <!-- Arrival Location Combo Box -->
        <label for="arrival">Arrival Location:</label>
        <select id="arrival" name="arrival" required>
            <option value="">Select a Location</option>
            <?php
            // Fetch all locations again for the combo box
            $result = $conn->query("SELECT LocationName FROM Locations ORDER BY LocationName");
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['LocationName'] === $route['ArrivalLocation']) ? 'selected' : '';
                echo "<option value='{$row['LocationName']}' $selected>{$row['LocationName']}</option>";
            }
            ?>
        </select><br><br>

        <!-- Departure Time -->
        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" value="<?php echo date('Y-m-d\TH:i', strtotime($route['DepartureTime'])); ?>" required><br><br>

        <!-- Arrival Time -->
        <label for="arrival_time">Arrival Time:</label>
        <input type="datetime-local" id="arrival_time" name="arrival_time" value="<?php echo date('Y-m-d\TH:i', strtotime($route['ArrivalTime'])); ?>" required><br><br>

        <!-- Bus Selection -->
        <label for="bus_id">Select Bus:</label>
        <select id="bus_id" name="bus_id" required>
            <?php
            $result = $conn->query("SELECT BusID, BusNumber FROM Buses ORDER BY BusNumber");
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['BusID'] === $route['BusID']) ? 'selected' : '';
                echo "<option value='{$row['BusID']}' $selected>{$row['BusNumber']}</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Update Schedule</button>
        <a href="bus_schedule_management.php"><button>back to Scheduler</button></a>
    </form>
</body>
</html>
