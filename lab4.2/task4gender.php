<?php 
    if(isset($_POST['Submit'])) 
    {
        $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

        if (empty($gender)) 
        {
            echo "Select gender.";
        } 
        else
        {
            echo "valid";
        }

    }
 ?>    