<?php


//array_chunk() :- split an array into group of array

$age = array(
    "Anjali" => "20",
    "Yashii" => "23",
    "Priya" => "25"

);
$newage = array_change_key_case($age, CASE_UPPER);
echo "<pre>";
print_r($newage);
echo "</pre>";
?>