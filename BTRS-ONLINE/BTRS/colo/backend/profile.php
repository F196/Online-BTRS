<?php require 'db_connection.php'; ?>
<?php
session_start();
$user_id = $_SESSION['UserID']; // Get logged-in user's ID

// Handle form submission to update user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['fullname'];
    $new_email = $_POST['email'];

    $update_query = $conn->prepare("UPDATE Users SET FullName = ?, Email = ? WHERE UserID = ?");
    $update_query->bind_param("ssi", $new_name, $new_email, $user_id);

    if ($update_query->execute()) {
        echo "<p style='color: green;'>Profile updated successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error updating profile: " . $update_query->error . "</p>";
    }
}

// Fetch updated user details
$result = $conn->query("SELECT FullName, Email FROM Users WHERE UserID = $user_id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/profile.css">
    <title>Profile</title>
    <script>
        // JavaScript to toggle the edit form
        function toggleEdit() {
            const detailsDiv = document.getElementById('profile-details');
            const editForm = document.getElementById('edit-form');
            detailsDiv.style.display = detailsDiv.style.display === 'none' ? 'block' : 'none';
            editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</head>
<body>
<div class="links">
    <a href="home.php"><img src="../img/logo.jpeg" alt="Logo" class="logo"></a>
    <nav>
        <a href="home.php">Home</a>
        <a href="ticket_reservation.php">Reserve a Ticket</a>
        <a href="profile.php">Profile</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php" class="logout">Logout</a>
    </nav>
</div>

    <h1>Your Profile</h1>
    
    <!-- Profile Details -->
    <div id="profile-details" style="display: block;">
        <p><strong>Name:</strong> <?php echo $user['FullName']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['Email']; ?></p>
        <button onclick="toggleEdit()">Edit Profile</button>
    </div>
    
    <!-- Edit Form -->
    <div id="edit-form" style="display: none;">
        <form method="POST">
            <label for="fullname">Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $user['FullName']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['Email']; ?>" required>
            <button type="submit">Update Profile</button>
        </form>
        <button onclick="toggleEdit()">Cancel</button>
    </div>

    <h2>Past Reservations</h2>
    <table>
        <thead>
            <tr>
                <th>Route</th>
                <th>Seat</th>
                <th>Reservation Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT Routes.DepartureLocation, Routes.ArrivalLocation, SeatNumber, ReservationDate 
                                    FROM Reservations 
                                    INNER JOIN Routes ON Reservations.RouteID = Routes.RouteID 
                                    WHERE UserID = $user_id");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['DepartureLocation']} to {$row['ArrivalLocation']}</td>
                        <td>{$row['SeatNumber']}</td>
                        <td>{$row['ReservationDate']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
