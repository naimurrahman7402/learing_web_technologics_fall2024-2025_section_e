<?php
session_start();

// Database connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "online_blog_system";  // Change if needed

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the author ID from the URL query string
if (isset($_REQUEST['id'])) {
    $authorId = $_REQUEST['id'];

    // Query to get author details from the database
    $sql = "SELECT * FROM authors WHERE id = $authorId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the author details
        $author = $result->fetch_assoc();
    } else {
        echo "author not found!";
        exit();
    }
} else {
    echo "No author ID provided!";
    exit();
}

$conn->close();
?>

<html>
<head>
    <title>Edit author</title>
</head>
<body>
    <h2>Edit author</h2>

    <!-- Form for editing author information -->
    <form method="post" action="update_author.php" enctype="">
        <input type="hidden" name="id" value="<?= $author['id'] ?>" />  <!-- Hidden field to pass author ID -->

        Author Name: <input type="text" name="author_name" value="<?= $author['author_name'] ?>" required /><br>
        Contact No: <input type="text" name="contact_no" value="<?= $author['contact_no'] ?>" required /><br>
        Username: <input type="text" name="username" value="<?= $author['username'] ?>" required /><br>
        Password: <input type="password" name="password" value="<?= $author['password'] ?>" required /><br>

        <input type="submit" name="submit" value="Update author" />
    </form>
   

</body>
</html>
