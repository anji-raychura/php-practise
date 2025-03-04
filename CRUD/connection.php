<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
  echo "Connection Done";
}
else
{
    echo "connection Failed".mysqli_connect_error();
}
?>