<?php
require 'db_connection.php';

if (isset($_GET['userid'])) {
    $userid = intval($_GET['userid']);

    // Step 1: Delete associated feedback
    $stmt1 = $conn->prepare("DELETE FROM feedback WHERE UserID = ?");
    $stmt1->bind_param("i", $userid);
    $stmt1->execute();
    $stmt1->close();

    // Step 2: Delete associated reservations
    $stmt2 = $conn->prepare("DELETE FROM reservations WHERE UserID = ?");
    $stmt2->bind_param("i", $userid);
    $stmt2->execute();
    $stmt2->close();

    // Step 3: Delete the user
    $stmt3 = $conn->prepare("DELETE FROM Users WHERE UserID = ?");
    $stmt3->bind_param("i", $userid);

    if ($stmt3->execute()) {
        echo "User and associated records deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $stmt3->close();
    header("Location: manage_users.php");
    exit();
} else {
    echo "Invalid UserID.";
}
?>
