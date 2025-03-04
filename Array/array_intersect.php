<?php
//Array_intersect :- used for match value  --- CASE SENSITIVE   
//Array_intersect_key :- use to match key
//Array_intersect_assoc :- math both key ANd Value
$emp = array("a"=>"Anjii","d"=>"Yashi","e"=>"Priya");
$emp1 = array("a"=>"Anjali","f"=>"Yashi","c"=>"Priya");

$newarr = array_intersect_key($emp,$emp1);

echo "<pre>";
print_r($newarr);
echo "</pre>";
?>
                
<?php
//Array_intersect_uassoc :- U STAND FOR ( USER DEFINE FUNCTION )(USE OWN FUNCTION)
//Array_uintersect_asso : Same 
//Array_intersect_key : user define function for match key 
function compare($a,$b)
{
    if($a == $b)
    {
        return 0;
    }
    return($a > $b)? 1 : -1;
}
$emp2 = array("a"=>"Anjii","b"=>"Yashi","c"=>"Priya");
$emp3 = array("a"=>"Anjii","e"=>"Yashi","f"=>"Priya");


$newemp = array_intersect_uassoc($emp2,$emp3,"compare");
echo "<pre>";
print_r($newemp);
echo "</pre>";
?> 