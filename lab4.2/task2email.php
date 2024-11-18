<?php 
        if (isset($_POST['Submit'])) 
        {
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';

            if (empty($email)) 
            {
                echo "E-mail is empty.";
            } 
            else 
            {
                $demo_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

                if (!preg_match($demo_email, $email)) 
                {
                    echo "Invalid email address.";
                } 
                else 
                {
                    echo "Valid email: " . ($email);
                   
                }
            }
        }
        ?>