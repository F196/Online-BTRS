<?php
require 'db_connection.php';

if (isset($_GET['routeid'])) {
    $routeid = intval($_GET['routeid']);

    // Step 1: Delete associated reservations
    $stmt1 = $conn->prepare("DELETE FROM Reservations WHERE RouteID = ?");
    $stmt1->bind_param("i", $routeid);
    $stmt1->execute();
    $stmt1->close();

    // Step 2: Delete associated feedback (if not already handled)
    $stmt2 = $conn->prepare("DELETE FROM Feedback WHERE RouteID = ?");
    $stmt2->bind_param("i", $routeid);
    $stmt2->execute();
    $stmt2->close();

    // Step 3: Delete the route from the routes table
    $stmt3 = $conn->prepare("DELETE FROM Routes WHERE RouteID = ?");
    $stmt3->bind_param("i", $routeid);

    if ($stmt3->execute()) {
        echo "Schedule deleted successfully.";
    } else {
        echo "Error deleting schedule: " . $conn->error;
    }

    $stmt3->close();
    header("Location: bus_schedule_management.php");
    exit();
} else {
    echo "Invalid RouteID.";
}
?>
