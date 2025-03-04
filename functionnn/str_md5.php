<?php

$name = "Anjali Raichura ";
echo "string is : $name <br>";

 //echo "md5 binary is :" .md5($name, TRUE)."<br><br>"; 
 // md5 converrt in binary num , for security of pass 
 // true value for bbinary

echo "md5 hexa num is :<br>"; //32 char
$new = md5($name);
echo $new."<br>";


if($name==$new)
{
    echo "chalte rho";
}
else{
    echo " Ruk jao";
}

?>