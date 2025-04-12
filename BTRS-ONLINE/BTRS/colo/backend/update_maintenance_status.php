<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bus_id = $_POST['bus_id'];
    $maintenance_status = $_POST['maintenance_status'];

    // Update the maintenance status in the Buses table
    $stmt = $conn->prepare("UPDATE Buses SET MaintenanceStatus = ? WHERE BusID = ?");
    $stmt->bind_param("si", $maintenance_status, $bus_id);

    if ($stmt->execute()) {
        echo "Maintenance status updated successfully!";
        header("Location: maintenance_logs.php"); // Redirect back to the logs page
        exit;
    } else {
        echo "Error updating maintenance status: " . $stmt->error;
    }
}
?>
