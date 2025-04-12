<!-- feedback.php -->
<?php require 'db_connection.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/feedback.css">
    <title>Feedback</title>
</head>
<body>
<div class="links">
    <a href="home.php"><img src="../img/logo.jpeg" alt="Logo" class="logo"></a>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="ticket_reservation.php">Reserve a Ticket</a>
        <a href="profile.php">Profile</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<h1>Leave Feedback</h1>
<form method="POST" action="submit_feedback.php">
    <label>Select Route:</label>
    <select name="route_id" required>
        <?php
        $result = $conn->query("SELECT RouteID, DepartureLocation, ArrivalLocation FROM Routes");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['RouteID']}'>{$row['DepartureLocation']} to {$row['ArrivalLocation']}</option>";
        }
        ?>
    </select>
    <textarea name="feedback_text" placeholder="Write your feedback here..." required></textarea>
    <button type="submit">Submit Feedback</button>
</form>
</body>
</html>
