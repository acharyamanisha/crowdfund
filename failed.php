<?php
session_start();

// Check if payment parameters are set (if applicable)
if (isset($_GET['order_id'], $_GET['project_id'])) {
    $order_id = $_GET['order_id'];
    $project_id = $_GET['project_id'];
    $email = $_GET['id']; // Assuming the email is passed as well

    // Show a failure message
    echo "<h1>Payment Failed</h1>";
    echo "<p>Unfortunately, your payment was not processed. Your order ID was <strong>" . htmlspecialchars($order_id) . "</strong>.</p>";
    echo "<p>If you believe this is an error, please contact support or try again.</p>";

    // Send failure email
    $subject = "Payment Failed - Order ID: $order_id";
    $message = "Dear User,\n\nUnfortunately, your payment was not processed.\nYour order ID was: $order_id\nProject ID: $project_id\n\nIf you believe this is an error, please contact support.\n\nBest regards,\nYour Team";
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
    echo "<p>No transaction details found. Please contact support.</p>";
}
?>
