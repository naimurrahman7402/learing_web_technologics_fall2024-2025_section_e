<?php
    session_start();

    // Database connection details
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "online_blog_system"; // Your database name

    // Create a connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch authors data from the database
    $sql = "SELECT id,author_name, contact_no, username FROM authors";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        // Fetch all authors
        $authors = [];
        while ($row = $result->fetch_assoc()) {
            $authors[] = $row;
        }
    } else {
        $authors = [];
    }

    // Close the database connection
    $conn->close();
?>

<html>
<head>
    <title>Authors List</title>
</head>
<body>
        <h2>Authors List</h2>
        <br>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Author Name</th>
                <th>Contact No</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php 
                // Display authors data if available
                if (count($authors) > 0) {
                    foreach ($authors as $authors) {
            ?>
            <tr>
                <td><?php echo $authors['id']; ?></td>
                <td><?php echo $authors['author_name']; ?></td>
                <td><?php echo $authors['contact_no']; ?></td>
                <td><?php echo $authors['username']; ?></td>
                <td>
                     <a href="edit_author.php?id=<?php echo $authors['id']; ?>">EDIT</a> 
                    <a href="delete_author.php?id=<?php echo $authors['id']; ?>">DELETE</a>
                </td>
            </tr>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No authors found</td></tr>";
                }
            ?>
        </table>
        <br>
        <a href="../View/admindashboard.html">
              <button >
                     Go to Admin Dashboard
              </button>
               </a>

        

</body>
</html>