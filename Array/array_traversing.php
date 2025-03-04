<?php
$fruits = array('Dragun','Kiwi','Applllleee','Strawberry');

echo "<b> Current : </b>".current($fruits)."<br>"; //-->> //print a current(1st) value

echo "<b> Key : </b>".key($fruits)."<br>";  //-> print a current key 

echo "<b> Pos: </b>".pos($fruits)."<br>";

next($fruits);                                           // pur cursor in next and after print current
echo "<b> Current : </b>".current($fruits)."<br>";

next($fruits);                                           // pur cursor in next and after print current
echo "<b> Current : </b>".current($fruits)."<br>";

prev($fruits);                                           // last current to previous 
echo "<b> Current : </b>".current($fruits)."<br>";

end($fruits);                                           // cursor directly move to last element of array
echo "<b> Current : </b>".current($fruits)."<br>";
echo "<b> Key : </b>".key($fruits)."<br>";


// echo "<pre>";
// print_r(each($fruits));                              ----->> each funcction...not supported in php version
// echo "<b> Current : </b>".current($fruits)."<br>";
// echo "</pre>";

reset($fruits);                                           // reset all element  
echo "<b> Current : </b>".current($fruits)."<br>";






?>