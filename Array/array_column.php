<?php
$array =array
(
    array(
        'name'=>"Anjii",
        "sub"=>"Maths",
        "marks"=>"88"

    ),
    array(
        'name'=>"yashii",
        "sub"=>"physics",
        "marks"=>"85"
    ),
    array(
        'name'=>"Priya",
        "sub"=>"Biology",
        "marks"=>"90"
    )
);

$newarr = array_column($array,'name',"marks");

echo "<pre>";
print_r($newarr);
echo "</pre>";
?>