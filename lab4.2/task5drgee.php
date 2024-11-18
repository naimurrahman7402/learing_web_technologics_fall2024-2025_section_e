  

        <?php 
            if(isset($_POST['Submit'])) {
                
                $degree = isset($_POST['degree']) ? trim($_POST['degree']) : '';

                if (empty($degree)) {
                    echo "Select degree.";
                } else {
                    echo "Valid information: " . $degree;
                }
            }
        ?>
   