<?php 
session_start();

if (isset($_REQUEST['submit'])) 
{
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);

  
    if (!isset($_SESSION['registered_user'])) 
    {
        echo "No registered user found. Please register first.<br>";
        echo '<a href="registration.html"> Registration </a>';
        exit();
    }

    
    $registeredUser = $_SESSION['registered_user'];

    if ($username === $registeredUser['username'] && $password === $registeredUser['password']) {
        
        $_SESSION['status'] = true;
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } 
    else 
    {
        
        echo "Invalid Username or Password.";
    }
} 
else
 {
    header('Location: login.html');
    exit();
}
?>
