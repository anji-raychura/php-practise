<?php
 error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>FILE UPLOAD</title>
    </head>
<body>
    <form action="" method="POST" enctype="multipart/form-data" >
        <input type="file" name="image"><br><br>
        <input type="submit" name="submit" value="Upload">
    </form>                                                                                                                   
</body>
</html>    
                                                                                                                                                                                                                                                                                                      
<?php
 
     
       echo  $file_name =  $_FILES["image"]["name"];
       echo $tmp_name =  $_FILES["image"]["tmp_name"];
        $folder = "photu/".$filename;
       
        move_uploaded_file($tmp_name,$folder);
        
       // echo "<img src='$folder' height ='100px'width ='100px'>";
   ?>
