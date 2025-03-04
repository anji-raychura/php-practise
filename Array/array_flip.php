<?php
// array_flip() :- is used for flip key to value ...kay become value and value becoe key
$array =array
(
        'name'=>"Anjii",
        "sub"=>"Maths",
        "marks"=>"88"
);

$newarr = array_flip($array);

echo "<pre>";
print_r($newarr);
echo "</pre>";

?>