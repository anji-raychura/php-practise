
<?php
//strip_tag :- remove all html tag 

//$str = "Hello,Bautiful Aftrernoon";
 //echo strip_tags($str);

//echo "<br>";
$string = "Hello My name is Anjali Raichura.";

echo wordwrap($string, 6,"<br>\n",TRUE);


?>