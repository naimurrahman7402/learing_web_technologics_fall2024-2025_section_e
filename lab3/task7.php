<?php

for($i=1;$i<5;$i++)
{
    for($j=1;$j<=$i;$j++)
    {
        print("* ");
    }
    print("<br>");
}
print("<br>");
$std= array(1,2,3,4,5,6,7,8,9,10,11,1,2,13,14,15,16,17,18,19,20);
for($i=0;$i<5;$i++)
{
    for($j=4;$j>=$i;$j--)
    {
        
    
         print($std[$i]);
        
    }
    print("<br>");
}
?>
