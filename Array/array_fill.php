<?php

//array_fill_keys :- make index array to associative with values 
//$a = ['1','2','3','4'];     
$a = array("1","2","3","4");
$newa = array_fill_keys($a,"ANji");  //  (var ,value)

echo "<pre>";
print_r($newa);
echo "</pre>";

?>


<?php
// array_fill :- 

$newa = array_fill(3,4,"Yashii");   //array-fill(index , number , value)

echo "<pre>";
print_r($newa);
echo "</pre>";

?>