<?php
    session_start();
    include '../Model/authorModel.php';  

    // Check if the form was submitted
    if (isset($_POST['register'])) {
        // Get the form data
        $author_name = trim($_POST['author_name']);
        $contact_no = trim($_POST['contact_no']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Validate the form inputs
        if ($author_name == null || $contact_no == null || $username == null || $password == null) {
            echo "All fields are required!";
        } else {
            // Call the function to add the author (this function will handle database insertion)
            $status = addAuthor($author_name, $contact_no, $username, $password);
            if ($status) {
                echo "Author registration successful!";
                header('Refresh: 3; URL=../View/register_authors.html');// Redirect to the dashboard after 3 seconds
                echo '<br>';
                echo '<a href="../View/admindashboard.html">
              <button >
                     Go to Admin Dashboard
              </button>
               </a>';

            } else {
                echo "Registration failed! Please try again.";
            }
        }
    } else {
        // Redirect to the registration page if the form wasn't submitted
        header('location: ../Control/register_authors.php');
    }
?>
