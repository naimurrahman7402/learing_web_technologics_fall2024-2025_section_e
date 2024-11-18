<?php 
if (isset($_POST['Submit'])) 
{
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';

    if (empty($name)) 
    {
        echo "Name is empty.";
    } 
    else if (strlen($name) < 2) 
    {
        echo "Name must be more than 2 characters.";
    } 
    else if (!preg_match('/^[a-zA-Z][a-zA-Z-]*$/', $name)) 
    {
        echo "Invalid name. Must start with a letter and contain only letters and dashes.";
    } 
    else 
    {
        echo "Valid name: " . $name;
        //header("Location: task2name.html");
      
    }
}
?>