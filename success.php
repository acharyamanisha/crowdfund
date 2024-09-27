<?php
session_start();
require 'dbconn.php';

// Check if payment parameters are set
if (isset($_GET['id'], $_GET['order_id'], $_GET['project_id'])) {
    $email = $_GET['id'];
    $order_id = $_GET['order_id'];
    $project_id = $_GET['project_id'];

    // Show a success message
    echo "<h1>Payment Successful!</h1>";
    echo "<p>Thank you for your pledge. Your order ID is <strong>" . htmlspecialchars($order_id) . "</strong>.</p>";
    echo "<p>Your support for project ID <strong>" . htmlspecialchars($project_id) . "</strong> is greatly appreciated!</p>";

    // Send confirmation email
    $subject = "Payment Successful - Order ID: $order_id";
    $message = "Dear User,\n\nThank you for your pledge!\nYour order ID is: $order_id\nProject ID: $project_id\n\nBest regards,\nYour Team";
    $headers = "From: no-reply@example.com\r\n"; // Replace with your sender email

    mail($email, $subject, $message, $headers);

    // Redirect to index after 5 seconds
    echo '<script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 5000);
          </script>';
} else {
    echo "<h1>Error</h1>";
    echo "<p>Transaction details not found. Please contact support.</p>";
}
?>
