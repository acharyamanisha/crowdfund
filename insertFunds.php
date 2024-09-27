<?php
require 'dbconn.php';

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

$email = $_SESSION['email']; // Get the logged-in user's email

// Check if the project ID is set in the session
if (isset($_SESSION['project_id']) && isset($_POST['pledged_money'])) {
    $pledged_money = filter_input(INPUT_POST, 'pledged_money', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $project_id = $_SESSION['project_id'];

    // Use prepared statements to avoid SQL Injection
    $stmt = $conn->prepare("INSERT INTO FUNDS (PROJECT_ID, EMAIL_ID, PLEDGED_MONEY, DATETIME_PLEDGED) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("ssd", $project_id, $email, $pledged_money);

    if ($stmt->execute()) {
        // Transaction details
        $orderno = uniqid();
        $transaction_uuid = $orderno;
        $product_code = "EPAYTEST";
        $secret = "8gBm/:&EnhH.1/q"; // Use environment variable

        // Prepare hash string and generate signature
        $ss = 'total_amount=' . $pledged_money . ',transaction_uuid=' . $transaction_uuid . ',product_code=' . $product_code;
        $hs = hash_hmac('sha256', $ss, $secret, true);
        $payment_api = "https://rc-epay.esewa.com.np/api/epay/main/v2/form";

        // Generate URLs
        $url = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'];

        // Prepare parameters for eSewa payment
        $paramList = [
            "product_code" => $product_code,
            "order_id" => $orderno,
            "customer_id" => $email,
            "total_amount" => $pledged_money,
            "transaction_uuid" => $transaction_uuid,
            "amount" => $pledged_money,
            "tax_amount" => 0,
            "success_url" => $url . "/crowdfund-main/success.php?id=" . urlencode($email) . "&order_id=" . urlencode($orderno) . "&project_id=" . urlencode($project_id),
            "failure_url" => $url . "/crowdfund-main/failed.php",
            "signature" => base64_encode($hs)
        ];

        $stmt->close();
        $conn->close();
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Redirecting to Payment Gateway</title>
        </head>
        <body>
            <h1>Please do not refresh this page...</h1>
            <form method="post" action="<?php echo htmlspecialchars($payment_api); ?>" name="f1">
                <?php
                foreach ($paramList as $name => $value) {
                    echo '<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '">';
                }
                ?>
                <input type="hidden" name="product_service_charge" value="0">
                <input type="hidden" name="product_delivery_charge" value="0">
                <input type="hidden" name="signed_field_names" value="total_amount,transaction_uuid,product_code">
            </form>
            <script type="text/javascript">
                document.f1.submit();
            </script>
        </body>
        </html>
        <?php
    } else {
        // Handle error if the pledge already exists
        if ($conn->errno === 1062) { // MySQL error code for duplicate entry
            ?>
            <script>
                alert("You have already pledged.");
                window.location.href = 'viewProject.php?project_id=<?php echo htmlspecialchars($project_id); ?>';
            </script>
            <?php
        } else {
            // Handle other errors
            ?>
            <script>
                alert("An error occurred: <?php echo htmlspecialchars($conn->error); ?>");
                window.location.href = 'viewProject.php?project_id=<?php echo htmlspecialchars($project_id); ?>';
            </script>
            <?php
        }
    }
} else {
    echo "Session not set or pledge amount not provided.";
}

?>
