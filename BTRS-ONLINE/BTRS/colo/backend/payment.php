<?php
// Simple payment processing script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    // Simulate a successful payment
    echo "Payment successful!<br>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Amount Paid: $" . htmlspecialchars($amount) . "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
    <h1>Bus Ticket Payment</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required><br><br>

        <button type="submit">Pay Now</button>
    </form>
</body>
</html>