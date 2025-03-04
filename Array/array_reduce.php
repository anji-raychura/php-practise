
<?php
function myfunction($n , $m){
    $n *= $m;
    return $n;
}
$a = [1,2,3,4,5];
$newarr = array_reduce($a , "myfunction" , 10);

echo "<pre>";
print_r($newarr);
echo "</pre>";
?>
 