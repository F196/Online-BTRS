<?php
require 'db_connection.php'; // Include the database connection
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $user_id = $_SESSION['UserID']; // The logged-in user's ID
    $route_id = $_POST['route_id'];
    $feedback_text = $_POST['feedback_text'];

    // Insert feedback into the database
    $feedback_query = $conn->prepare("INSERT INTO Feedback (UserID, RouteID, FeedbackText) VALUES (?, ?, ?)");
    $feedback_query->bind_param("iis", $user_id, $route_id, $feedback_text);

    if ($feedback_query->execute()) {
        echo "Feedback submitted successfully!";
        header("Location: home.php"); // Redirect to the home page
        exit;
    } else {
        echo "Error: " . $feedback_query->error;
    }
}
?>
