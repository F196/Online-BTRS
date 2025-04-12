<?php
require 'db_connection.php';

if (isset($_GET['userid'])) {
    $userid = intval($_GET['userid']);

    // Fetch user details
    $stmt = $conn->prepare("SELECT FullName, Email, RoleID FROM Users WHERE UserID = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
        echo "User not found.";
        exit();
    }
} else {
    echo "Invalid UserID.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $roleid = intval($_POST['roleid']);

    // Update user details
    $stmt = $conn->prepare("UPDATE Users SET FullName = ?, Email = ?, RoleID = ? WHERE UserID = ?");
    $stmt->bind_param("ssii", $fullname, $email, $roleid, $userid);

    if ($stmt->execute()) {
        echo "User updated successfully.";
        header("Location: manage_users.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../styles/bus_schedule_management.css">

</head>
<body>
    <h1>Edit User</h1>
    <form method="POST">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['FullName']); ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" required><br><br>

        <label for="roleid">Role ID:</label>
        <input type="number" id="roleid" name="roleid" value="<?php echo htmlspecialchars($user['RoleID']); ?>" required><br><br>

        <button type="submit">Update User</button>
    </form>
</body>
</html>
