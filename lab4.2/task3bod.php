<?php 
    if(isset($_POST['Submit'])) 
    {
        $date = isset($_POST['date']) ? trim($_POST['date']) : '';

        if (empty($date)) 
        {
            echo "Date is empty.";
        } 
        else 
        {
            
            $dateObject = DateTime::createFromFormat('Y-m-d', $date);

            if ($dateObject && $dateObject->format('Y-m-d') === $date) 
            {
                echo "Valid BOD: " . $date;
            }
             else 
            {
                echo "Date format is invalid.";
            }
        }
    }
?>
