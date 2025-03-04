<?php
//array_chunk() :- split an array into group of array

$age = array(
    "Anjali" => "20",
    "Yashii" => "23",
    "Priya" => "25"

);
$newage = array_chunk($age,2,true);
echo "<pre>";
print_r($newage);
echo "</pre>";
?>,