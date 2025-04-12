<?php require 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/ticket_reservation.css">
    <title>Ticket Reservation</title>
</head>
<body>
<div class="links">
    <a href="home.php"><img src="../img/logo.jpeg" alt="Logo" class="logo"></a>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="ticket_reservation.php">Reserve a Ticket</a>
        <a href="profile.php">Profile</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

    <h1>Reserve Your Ticket</h1>
    <form method="POST" action="reserve_ticket.php">
        <!-- Route Selection -->
        <label for="route_id">Select Route:</label>
        <select id="route_id" name="route_id" required>
            <option value="">Select Route</option>
            <?php
            // Fetch routes from the database
            $result = $conn->query("SELECT RouteID, DepartureLocation, ArrivalLocation, DepartureTime FROM Routes");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['RouteID']}'>{$row['DepartureLocation']} to {$row['ArrivalLocation']} - {$row['DepartureTime']}</option>";
            }
            ?>
        </select>

        <!-- Seat Selection -->
        <label for="seat_number">Choose Seat:</label>
        <select id="seat_number" name="seat_number" required>
            <option value="">Select Seat</option>
            <?php
            // Generate seat numbers from 1 to 82
            for ($i = 1; $i <= 82; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <button type="submit">Reserve Ticket</button>
    </form>
</body>
</html>
