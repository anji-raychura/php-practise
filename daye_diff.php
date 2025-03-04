<?php
$date1 = date_create("2003-09-02");
$date2 = date_create("2004-02-25");

$diff = date_diff($date1,$date2);


//echo $diff->days." Days";   //normal days oputput 

echo $diff->format("%R%a");  // formate- by defult function % is necessary  , give output with + and - 
echo "<pre>";
print_r($diff);
echo "</pre>";
?>   