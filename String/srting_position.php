<?php
$a = "Hello,Good morning.Hello This is php";
echo "strpos is : ".strpos($a,"is",-10)."<br>";      // give the position of word  and  count from starting
                                                        //  CASE SENSITIVE
 echo "strpos is : ".stripos($a,"is",-10)."<br>";     // use same to strpos -  NOT CASE SENSITIVE

 echo "strrpos id : ".strrpos($a,"Hello")."<br>";  // reverse position . count from start  CASE SENSITIVE
 echo "strripos id : ".strrpos($a,"Hello")."<br>";   // same to stripos but NOT CASE SENSITIVE

?>