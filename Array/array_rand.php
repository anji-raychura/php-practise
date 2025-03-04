<?php
//Array_rand() :- select a random value when you referesh it take diff random value 

$name = ['Anjii','Yashiii','Priyaa'];

$randomname = array_rand($name);   //array-rand($... , 2) -> 2 for take two random value 

echo "<pre>";
print_r($randomname);
echo "</pre>";

echo $name[$randomname];
?>