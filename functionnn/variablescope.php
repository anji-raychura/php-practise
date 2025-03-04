<?php

$x = " 25feb";  
$y = "2sep";          
function number(){
   Global $x,$y;                 //with global keyword it will print this value
    echo "Your bdate is ".$y. "<br>";
}
number();
echo "My bdate is".$x;