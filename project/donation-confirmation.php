<?php
// Database connection (replace with your actual credentials)
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "cloudfundingdatainfo"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure that the 'transactionID' is passed in the URL
if (isset($_GET['transactionID'])) {
    $transactionID = $_GET['transactionID'];
} else {
    die("Transaction ID is missing.");
}

// Query to fetch donation details using the transaction ID
$sql = "SELECT donations.donation_id, donations.amount, donations.currency, donations.transaction_id, donations.created_at AS donation_date, 
            users.username AS donor_name, users.email AS donor_email, 
            campaigns.title AS campaign_title, campaigns.goal_amount, campaigns.current_amount
        FROM donations
        JOIN users ON donations.backer_id = users.user_id
        JOIN campaigns ON donations.campaign_id = campaigns.campaign_id
        WHERE donations.transaction_id = ?";
        
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $transactionID);  // 's' is for string parameter
$stmt->execute();
$result = $stmt->get_result();

// Check if donation exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Donor and donation details
    $donorName = $row['donor_name'];
    $donorEmail = $row['donor_email'];
    $donationAmount = $row['amount'];
    $currency = $row['currency'];
    $transactionID = $row['transaction_id'];
    $donationDate = date("F j, Y", strtotime($row['donation_date']));
    $campaignTitle = $row['campaign_title'];
    $goalAmount = $row['goal_amount'];
    $currentAmount = $row['current_amount'];

    // Social media sharing URL (Example for Facebook, Twitter, Instagram)
    $campaignURL = "http://example.com/campaign?id=" . urlencode($campaignTitle);
    $facebookShare = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($campaignURL);
    $twitterShare = "https://twitter.com/intent/tweet?url=" . urlencode($campaignURL) . "&text=I just donated to " . urlencode($campaignTitle);
    $instagramShare = "#shareyourdonation"; // Instagram doesn't support URL sharing directly

    // Prepare the email content
    $subject = "Thank You for Your Donation to " . $campaignTitle . "!";
    
    // HTML content for the email
    $emailContent = "
    <html>
    <head>
        <title>Donation Confirmation - " . $campaignTitle . "</title>
    </head>
    <body>
        <h1>Thank you for your generous donation!</h1>
        <p>Dear " . $donorName . ",</p>
        <p>Thank you for supporting <strong>" . $campaignTitle . "</strong>. Your donation helps us achieve our goal of [goal description].</p>
        
        <h2>Donation Details:</h2>
        <ul>
            <li><strong>Amount:</strong> " . $currency . " " . $donationAmount . "</li>
            <li><strong>Campaign Title:</strong> " . $campaignTitle . "</li>
            <li><strong>Transaction ID:</strong> " . $transactionID . "</li>
            <li><strong>Donation Date:</strong> " . $donationDate . "</li>
            <li><strong>Current Campaign Total:</strong> " . $currency . " " . $currentAmount . " of " . $currency . " " . $goalAmount . "</li>
        </ul>
        
        <h3>Your Donation Receipt:</h3>
        <p>You can download your receipt here: <a href='#'>Download PDF Receipt</a></p>
        
        <h3>Share Your Donation:</h3>
        <p>Share your donation on social media and inspire others!</p>
        <ul>
            <li><a href='" . $facebookShare . "' target='_blank'>Share on Facebook</a></li>
            <li><a href='" . $twitterShare . "' target='_blank'>Share on Twitter</a></li>
            <li><a href='#'>Share on Instagram (Use #shareyourdonation)</a></li>
        </ul>

        <p>Thank you again for your generosity. Stay tuned for updates on the campaign!</p>
        <footer>
            <p>If you have any questions, please contact us at <a href='mailto:support@example.com'>support@example.com</a></p>
            <p>&copy; 2025 [Your Campaign Name]. All Rights Reserved.</p>
        </footer>
    </body>
    </html>
    ";

    // Use PHPMailer for email sending
    require 'vendor/autoload.php';  // Ensure Composer's autoloader is included

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';  // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com';  // SMTP username
        $mail->Password = 'your-email-password';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('no-reply@example.com', 'Crowdfunding Team');
        $mail->addAddress($donorEmail, $donorName);  // Add recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $emailContent;

        // Send email
        $mail->send();
        echo 'Confirmation email has been sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Donation not found!";
}

// Close the database connection
$conn->close();
?>
