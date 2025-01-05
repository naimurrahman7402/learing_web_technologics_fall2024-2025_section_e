<?php
// Check if campaign_id is passed in the URL
if (isset($_GET['campaign_id'])) {
    $campaignID = $_GET['campaign_id'];
} else {
    echo "Campaign ID is missing.";
    exit; // Stop further execution if campaign_id is not provided
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cloudfundingdatainfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch updates for the campaign
$sql = "SELECT title, content, created_at FROM campaign_updates WHERE campaign_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $campaignID);
$stmt->execute();
$result = $stmt->get_result();

// Display updates
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='update'>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "<p><em>Posted on: " . $row['created_at'] . "</em></p>";
        echo "</div>";
    }
} else {
    echo "<p>No updates available for this campaign yet.</p>";
}

// Close the connection
$conn->close();
?>
