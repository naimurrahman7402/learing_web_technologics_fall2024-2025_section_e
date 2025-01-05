<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cloudfundingdatainfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if campaign_id is passed in the URL
if (isset($_GET['campaign_id'])) {
    $campaignID = $_GET['campaign_id'];
} else {
    echo "Campaign ID is missing!";
    exit; // Stop further execution if campaign_id is not provided
}

// Define the function to get backers for the campaign
function getBackers($conn, $campaignID) {
    // Prepare SQL query to fetch backers for the given campaign
    $sql = "SELECT users.username, users.email 
            FROM donations 
            JOIN users ON donations.backer_id = users.user_id 
            WHERE donations.campaign_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $campaignID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Return the result
    return $result;
}

// Get backers for the campaign
$backers = getBackers($conn, $campaignID);

// If backers are found, send emails
if ($backers->num_rows > 0) {
    while ($row = $backers->fetch_assoc()) {
        $donorName = $row['username'];
        $donorEmail = $row['email'];

        // Prepare the email content (simplified version)
        $subject = "Thank you for supporting the campaign!";
        $message = "Dear $donorName,\n\nThank you for your support.\n\nBest Regards,\nCampaign Team";
        $headers = "From: no-reply@yourdomain.com";

        // Send email
        if (mail($donorEmail, $subject, $message, $headers)) {
            echo "Email sent to $donorName ($donorEmail)\n";
        } else {
            echo "Failed to send email to $donorName ($donorEmail)\n";
        }
    }
} else {
    echo "No backers found for this campaign.";
}

// Close the connection
$conn->close();
?>
