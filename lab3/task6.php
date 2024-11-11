<?php
$m=4;
$std= array(1,2,3,4,5,6,7,8,9,10,11,1,2,13,14,15,16,17,18,19,20);
print("Elements are: ");
for($i=0;$i<=20;$i++)
{
    print($std[$i].", ");
}
print("<br>");
print("Element have to found is: ".$m."<br>");
for($i=0;$i<=20;$i++)
{
    if($std[$i]==$m)
    {
        print("Found element in position: ".$i+1);
    }
}
?>