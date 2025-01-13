<?php
function getConnection(){
    // Database connection details
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "online_blog_system";  // Database name, change if needed

// Create a connection
$con = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
return $con;

}

function addAuthor($author_name, $contact_no, $username, $password) {
    $con= getConnection();
    
    $sql = "INSERT INTO authors (author_name, contact_no, username, password) 
            VALUES ('$author_name', '$contact_no', '$username', '$password')";
    return mysqli_query($con, $sql);

}

function deleteAuthor($author_id) {
    $con = getConnection();
    $sql = "DELETE FROM authors WHERE id={$author_id}";
    return mysqli_query($con, $sql);
}
?>
