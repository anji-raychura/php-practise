<?php 

$str = "Hello,Good Morning php, lets talk php";
 
echo strstr($str,"Good")."<br>";          // start string from good   
                                          // true :- print string before Good 
                                          // CASE SENSITIVE

echo stristr($str,"GOOD",true)."<br>";    // same work but NOT SENSITIVE


// reverse order 
echo strrchr($str,"Good")."<br>";    // last thi good sear kri ena pchi nu print thase 
                                     // true work same 


echo strpbrk($str,"M")."<br>";    // only G  word pchi nu bdhu count krse  

?>