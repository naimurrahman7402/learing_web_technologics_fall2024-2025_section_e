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

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $author_name = $_POST['author_name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update the employee details in the database
    $sql = "UPDATE authors SET author_name='$author_name', contact_no='$contact_no', username='$username', password='$password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Authir details updated successfully!";
        header('Refresh:1; URL=../View/view_author.php');  // Redirect to the employee list after a few seconds
    } else {
        echo "Error updating author: " . $conn->error;
    }
}


$conn->close();

?>
