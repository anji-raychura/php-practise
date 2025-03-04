<?php
function square($x,$y){
    return "$x for $y";
}
$a = [1,2,3,4];
$b = ['Anjii','Yashii','Pree'];

$newarr = array_map("square", $a,$b);

echo "</pre>";
print_r($newarr);
echo "</pre>";
?>