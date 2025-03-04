<?php
function myfunc(){  
    echo "hello";
}
$funcRef = myfunc();

$myArr = array("kalp",["kk","patel"],"krunal","yash", $funcRef);
//$myArr = array("kalp", ["kk", "patel"], "krunal", "yash", myfunc(...));
echo $myArr[4];
?>