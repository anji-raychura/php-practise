<?php

echo "max value: ". max(9.9,9.11);
echo "<br>";
echo "<br>";

$abs = -9.9;
$ceil = 9.9;
$floor = 9.9;
$round = 9.9;

echo "Absolute value : ";
echo abs($abs);
echo "<br>";
echo "<br>";


echo "ceil value : ".ceil($ceil);
echo "<br>"; 
echo "<br>"; 

echo "Floor Value: ".floor($floor);
echo "<br>";
echo "<br>";

echo "Round value : ".round($round);
echo "<br>"; 
echo "<br>"; 

echo "==============================================================================================================";
echo "<br>";
echo "<br>";


echo "This is Power() Function : ".pow(3,3);
echo "<br>";
echo "<br>";

echo "This is sqrt() Function : ".sqrt(16);
echo "<br>";
echo "<br>";

echo "This is intdiv() Function : ".intdiv(8,2); // 8 ne 4 vade jenathi bhagi skay te intdiv ma ave.
echo "<br>";
echo "<br>";

echo "Random function : ".rand(1,10);
echo "<br>";
echo "Random function : ".mt_rand(1,10);




echo rand(25,30)."<br>"; //give random num bet 25 to 30 ..every time we shuffle 

echo mt_rand(25,30)."<br>";  // same as rabd() but it -4 tieme more faster than rand()
                                //accurancy is fast than rand()

echo lcg_value();   // give random value between 0 and 1 only
?>