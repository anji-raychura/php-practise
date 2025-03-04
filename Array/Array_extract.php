<?php

//extract :- extract(array,extract_rules,prefix )
//key ne extract kri variable ma convert kre

$x1 =  array("a"=>"Anjali","b"=>"Yashi","e"=>"olly");

extract($x1);

echo "$a <br>";
echo "$b <br>";

?>