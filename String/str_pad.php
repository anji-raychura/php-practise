<?php
$a = "Anjii";

echo (str_pad($a,8,"-",STR_PAD_LEFT))."<br>";
echo (str_pad($a,8,"-",STR_PAD_RIGHT))."<br>";
echo (str_pad($a,8,"-",STR_PAD_BOTH))."<br>";

?>

<?php
$x = "wow";
echo(str_repeat($x,5))."<br>";


$x = "Anjii " . str_repeat("wow ", 5);
echo $x . "<br>";
?>