<?php
$str = "My name is Anjali Raichura <br>";

$ecode = convert_uuencode($str)."<br><br>"; ///encrypt a string and store

echo "This is encrypt code " .$ecode."<br><br>";

$dcode = convert_uudecode($ecode)."<br><br>"; // decrypt string into original 
 echo $dcode;


?>