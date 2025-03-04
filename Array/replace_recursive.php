

<?php
$emp = array("a"=>array("Anjali"),"d"=>array("Yashi","Priya"));
$emp1 = array("a"=>array("honey"),"d"=>array(1=>"dolly"));
$emp2 = ['Heheh','goo'];

$newarr = array_replace_recursive($emp, $emp1, $emp2);
echo "<pre>";
print_r($newarr) ; 
echo "</pre>";


?>