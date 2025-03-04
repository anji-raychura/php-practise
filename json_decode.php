<?php
$name ='{"Anjali":21,"yash":22}';
$object = json_decode($name,true);

//echo $object->yash;

//code1

/*$key = array_keys($object);
echo $key[0]; 
echo $key[1];   */

//code2

foreach ($object as $key => $value) 
{
    echo $key."=>".$value."<br>";
}


?>  