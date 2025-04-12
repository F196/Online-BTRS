<?php
require 'db_connection.php';  
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user_id = $_SESSION['UserID'];  
    $route_id = $_POST['route_id'];
    $seat_number = $_POST['seat_number'];

    $check_seat_query = $conn->prepare("SELECT * FROM Reservations WHERE RouteID = ? AND SeatNumber = ?");
    $check_seat_query->bind_param("ii", $route_id, $seat_number);
    $check_seat_query->execute();
    $result = $check_seat_query->get_result();

    if ($result->num_rows > 0) {
         
        echo "Sorry, this seat is already reserved. Please choose another.";
    } else {
       
        $reserve_query = $conn->prepare("INSERT INTO Reservations (UserID, RouteID, SeatNumber) VALUES (?, ?, ?)");
        $reserve_query->bind_param("iii", $user_id, $route_id, $seat_number);
        if ($reserve_query->execute()) {
            echo "Ticket reserved successfully!";
            header("Location: profile.php");  
            exit;
        } else {
            echo "Error: " . $reserve_query->error;
        }
    }
}
?>
