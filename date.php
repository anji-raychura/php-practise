<?php
echo "Today is ".date("d")."<br>";
echo "Today is ".date("jS")."<br>";
echo "Month is ".date("F")."<br>";
echo "month is ".date("m")."<br>";
echo "month is ".date("n")."<br>";
echo "month is ".date("M")."<br>";
echo "Year is ".date("Y")."<br>";
echo "Year is ".date("y")."<br>";
echo "FUll date  ".date("d/m/Y")."<br>";
echo "FUll date  ".date("Y-m-d")."<br>";
echo "Week day ".date("D")."<br>";
echo "Week day ".date("l")."<br>";
echo "Week day ".date("N")."<br>";
echo "Week day ".date("w")."<br>";    
echo " day of the year ".date("z")."<br>"; //give day in 365 daysn
echo "Week of the year ".date("W")."<br>"; //give week of year
echo "days of the month ".date("t")."<br>";
echo "leap year".date("L")."<br>"; //give 2 answer if 1 = leap year , 0= not leap year



echo checkdate(2,15,2003)."<br>";   //1 

echo checkdate(2,29,2003)."<br>";   //0 

?>
