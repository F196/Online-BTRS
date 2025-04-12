<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departure_location = $_POST['departure'];
    $arrival_location = $_POST['arrival'];

    // Combine date and time for departure and arrival
    $departure_datetime = $_POST['departure_date'] . ' ' . $_POST['departure_time'];
    $arrival_datetime = $_POST['arrival_date'] . ' ' . $_POST['arrival_time'];

    $bus_id = $_POST['bus_id'];

    // Insert into the database
    $stmt = $conn->prepare("INSERT INTO Routes (DepartureLocation, ArrivalLocation, DepartureTime, ArrivalTime, BusID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $departure_location, $arrival_location, $departure_datetime, $arrival_datetime, $bus_id);

    if ($stmt->execute()) {
        echo "Schedule added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="bus_schedule_management.php"><button>Back to Scheduler</button></a>
</body>
</html>