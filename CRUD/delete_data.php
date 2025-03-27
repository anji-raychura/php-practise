<?php
include("connection.php");
    
$ID = $_GET['id'];

$query = "DELETE FROM alldata WHERE id = '$ID'";
$data = mysqli_query($conn,$query);

if($data)
{
    echo "DELETED SUCESSFULLY";
    ?>
    <!-- auto refresh..with  content second 3 second anmd directly display to link -->
<meta http-equiv = "refresh" content = "0; url =            
http://localhost/allfiles/CRUD/data.php"/>


<?php
}
else
{
    echo "FAILED to DELETE";
}
?>