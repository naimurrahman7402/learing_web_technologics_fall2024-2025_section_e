<?php
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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campaignID = $_POST['campaign_id'];
    $updateTitle = $_POST['update_title'];
    $updateContent = $_POST['update_content'];

    // Insert new update into the database
    $sql = "INSERT INTO campaign_updates (campaign_id, title, content, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $campaignID, $updateTitle, $updateContent);
    if ($stmt->execute()) {
        echo "Update added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close the connection
$conn->close();
?>

<!-- HTML Form to Add Updates -->
<form method="POST" action="add-update.php">
    <label for="campaign_id">Campaign ID:</label>
    <input type="number" id="campaign_id" name="campaign_id" required><br>

    <label for="update_title">Update Title:</label>
    <input type="text" id="update_title" name="update_title" required><br>

    <label for="update_content">Update Content:</label>
    <textarea id="update_content" name="update_content" required></textarea><br>

    <button type="submit">Add Update</button>
</form>
