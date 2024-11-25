<?php 
session_start();

if (isset($_REQUEST['submit'])) 
{
    
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $email = trim($_REQUEST['email']);
    $date = trim($_REQUEST['date']);
    $department = trim($_REQUEST['department']); 
    $bloodGroup = trim($_REQUEST['blood_group']); 
    $gender = trim($_REQUEST['gender']);     

  

    // Validate inputs
    if (empty($username)) {
        echo "Username is empty.";
    }
    if (empty($password)) {
        echo "Password is empty.";
    }
    if (empty($email)) {
        echo "Email is empty.";
    }
    if (empty($date)) {
        echo "Date is empty.";
    }
    if (empty($department)) {
        echo "Department is empty.";
    }
    if (empty($bloodGroup)) {
        echo "Blood group is empty.";
    }
    if (empty($gender)) {
        echo "Gender is empty.";
    }

    
    
    $_SESSION['registered_user'] = [
        'username' => $username,
        'password' => $password, 
        'email' => $email,
        'date' => $date,
        'department' => $department,
        'blood_group' => $bloodGroup,
        'gender' => $gender,
    ];

    echo "<h3>Registration Successful</h3>";
    echo "<p>Data has been saved. You can now log in.</p>";
    echo '<a href=login.html> Login </a>';
}
?>
    

