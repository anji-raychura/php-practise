<?php
//pop:- remove an element from last
$subject = array("Maths","Science","Physics","Chemistry",55);

array_pop($subject);

echo "<pre>";
print_r($subject);
echo "</pre>";

?>

<?php
//push :- add elemnt from the last

$subject = array("Maths","Science","Physics","Chemistry",55);

//array_pop($subject);
array_push($subject, "JEE");

echo "<pre>";
print_r($subject);
echo "</pre>";

?>