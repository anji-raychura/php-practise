<?php
//$emp = array("Anjali","Yashi","Priya");
$emp = ['Anjali','Yashi','Priya'];

$emp1 = ['Dolly',2=>'honey'];

$newarr = array_replace($emp, $emp1);
echo "<pre>";
print_r($newarr) ; 
echo "</pre>";


?>