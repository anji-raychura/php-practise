<?php
// array_walk(array,Function,parameter)
$a = array(
    "Anjii"=>10,
    "yashhii"=>20,
    "Pree"=>30,
);

array_walk($a,"myfunction", "HELLLOO  ");
function myfunction($key, $value, $param){
    echo "$key $param $value <br>";
}
?>

<?php
$color = array("1"=>"Red","2"=>"Black");
$a = array(
    $color,
    "Anjii"=>10,
    "yashhii"=>20,
    "Pree"=>30,
);

array_walk_recursive($a,"recursive", "  is :    <br>");
function recursive($key, $value, $param){
    echo "$key $param $value <br>";
}
?>