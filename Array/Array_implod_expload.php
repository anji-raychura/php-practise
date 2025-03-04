<?php 
    // $arr = array("red","blue","orange","green");
    // EXPLODE: It will convert string to array 
    echo "EXPLODE: It will convert string to array"."<br>";
    $arr = "Yash.a.shah";
    $example = explode(".",$arr);

    print_r($example);


    echo "<br>";
    echo "<br>";
    echo "<br>";
    // IMPLODE: It will convert array to string
    echo "IMPLODE: It will convert array to string"."<br>";
    $arr = array("red","blue","orange","green");
    $example = implode("/",$arr);
    
     print_r($example);

?>