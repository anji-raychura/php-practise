<?php
$str = "My name is Anjali Raichura <br>";

$ecode = convert_uuencode($str)."<br><br>";

echo "This is encrypt code " .$ecode."<br><br>";

$dcode = convert_uudecode($ecode)."<br><br>";
 echo $dcode;


?>