<?php 
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== true)
 {
    header('Location: login.html');
    exit();
 }
?>

<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
        <h1>Welcome Home!<?=$_SESSION['username']?></h1>    
        <a href="logout.php"> logout </a>
</body>
</html> 