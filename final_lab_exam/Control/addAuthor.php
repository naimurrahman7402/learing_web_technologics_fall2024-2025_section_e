<?php
// Function to add an author to the database
function addAuthor($author_name,$contact_no, $username, $password) 
{
    // Database connection details
    $servername = "localhost";
    $dbUsername = "root";     
    $dbPassword = "";         
    $dbName = "online_blog_system";  // Change this if needed

    // Create a connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // Escape the user input to prevent SQL injection
    $author_name = $conn->real_escape_string($author_name);
    $contact_no = $conn->real_escape_string($contact_no);
    $username = $conn->real_escape_string($username);

    // SQL query to insert the new author into the database
    $sql = "INSERT INTO authors (author_name, contact_no, username, password) 
            VALUES ('$author_name', '$contact_no', '$username', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Close the connection
        $conn->close();
        return true;  // Return true if successful
    } else {
        // Close the connection
        $conn->close();
        return false;  // Return false if there was an error
    }
}
?>
