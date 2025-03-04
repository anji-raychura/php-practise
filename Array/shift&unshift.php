<?php
//array_shift() :- remove element from  First 

$subject = array("Maths","Science","Physics","Chemistry",55);

array_shift($subject);

echo "<pre>";
print_r($subject);
echo "</pre>";
?>

<?php
//arrray_unshift :- Add element from the first 

$subject = array("Maths","Science","Physics","Chemistry",55);

array_unshift($subject);

echo "<pre>";
print_r($subject);
echo "</pre>";

?>