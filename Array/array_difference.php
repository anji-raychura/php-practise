<?php
//array_diff_key :- Find the diffent key 
$x1 =  array("a"=>"Anjali","b"=>"Yashi","e"=>"olly");
$x2 = array("a"=>"Anjali","j"=>"Yashi","e"=>"Dolly");

$newx = array_diff_key($x1,$x2);

echo "<pre>";
print_r($newx);
echo "</pre>";
?>



<?php
//array_diff_assoc :- Check different in key and value both  \ avalible  in associative
$x1 =  array("a"=>"Anjali","b"=>"Yashi","e"=>"olly");
$x2 = array("a"=>"Anjali","j"=>"Yashi","e"=>"Dolly");

$newx = array_diff_assoc($x1,$x2);

echo "<pre>";
print_r($newx);
echo "</pre>";

?>

<?php
//array+_udifff :- compare a diff value with user define  
function compare($a,$b)
{
    if($a == $b)
    {
        return 0;
    }
    return($a > $b)? 1 : -1;
}
$x1 =  array("a"=>"Anjali","b"=>"Yashi","e"=>"olly");
$x2 = array("a"=>"Anjali","j"=>"Yashi","e"=>"Dolly");

$newx = array_udiff($x1,$x2,"compare");

echo "<pre>";
print_r($newx);
echo "</pre>";

?>

<?php
// array_udiff_uassoc 
// work with associative array  & for comare 2 array we need to create 2 function

function compareee($a,$b)
{
    if($a == $b)
    {
        return 0;
    }
    return($a > $b)? 1 : -1;
}
function comparevalue($a,$b)
{
    if($a == $b)
    {
        return 0;
    }
    return($a > $b)? 1 : -1;
}
$x1 =  array("a"=>"Anjali","b"=>"Yashi","e"=>"olly");
$x2 = array("a"=>"Anjali","j"=>"Yashi","e"=>"Dolly");

$newx = array_udiff_uassoc($x1,$x2,"compareee", "CompareValue");

echo "<pre>";
print_r($newx);
echo "</pre>";





?>