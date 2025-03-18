

<?php 
session_start();
include("connection.php");?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleee.css">
</head>
<body>
    <div class ="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class ="title">
            Registration Form 
        </div>
        <div class ="Form">

           <div class = "input_field">
                <label>IMAGE </label>
                <input type="file" name="uploadfile" style="width:120%;" required>
            </div>
            <div class = "input_field">
                <label>First Name</label>
                <input type="text" class="input" name="fname" required>
            </div>
            <div class ="input_field">          
                <label>Last Name</label>                                       
                <input type="text" class="input" name="lname" required>
            </div>
            <div class ="input_field">
                <label>Email</label>
                <input type="email" class="input" name="email" required>
            </div>                                   
            <div class ="input_field">
                <label>Password</label>                                           
                <input type="password" class="input" name="pswd" required>
            </div>
            <div class ="input_field">
                <label>confirm password</label>
                <input type="password" class="input" name="confirm_pswd" required>
            </div>
            <div class ="input_field">
                <label>Gender</label>
                <div class ="custom_select">
                <select name="gender" required>
                    <!-- <option>Select</option> -->
                    <option>Female</option>
                    <option>Male</option>
                     <option>Other</option>    
                </select>
                </div>
             </div>
             <div class ="input_field">
                <label>Phone No</label>
                <input type="text" class="input" name="ph_no" required>
            </div>
            <div class ="input_field">
                <label>caste</label>
                    <div class="radio-label">
                        <input type="radio" name="caste" value="Obc" id="OBC" required><label for="OBC">Obc</label>
                        <input type="radio" name="caste" value="Sc"  id="SC" required><label for="SC">Sc</label><br/>
                        <input type="radio" name="caste" value="St"  id="ST" required><label for="ST">St</label>
                        <input type="radio" name="caste" value="General" id="general" required><label for="general">General</label>
                    </div>       
            </div>
            <div class ="input_field">          
                <label>Adress</label>
                <textarea class="textarea" name="adress" required></textarea>         
            </div>
            <div class ="input_field terms" required>
                <label class ="check">
                <input type="checkbox" name='terms'>
                <span class="checkmark"></span>
                </label>
                <p> Agree to all the tearms and Conditions</p>
            </div>
            <div class ="input_field">                                                                      
                <input type="submit" value="Submit" class="btn" name="register">
            </div>
        </div>
        </form>
    </div>
</body>
</html>

<?php

if(isset($_POST['register']))
{
    if (!isset($_POST['terms'])) {
        die("Error: You must agree to the terms and conditions.");
    }


 $filename =  $_FILES["uploadfile"]["name"];
 $tempname =  $_FILES["uploadfile"]["tmp_name"];
 $folder = "photu/".$filename;
 //move_uploaded_file($tempname, $folder);

 if (!move_uploaded_file($tempname, $folder))
{                             
    die("File upload failed!");
}

    $fname = $_POST['fname'];   //we can also use diff var name
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    $confirm_pswd = $_POST['confirm_pswd'];

    if (strlen($pswd) < 5) {
        die("Error: Password must be at least 5 characters long.");
    }
    if ($pswd !== $confirm_pswd) {
        die("Error: Passwords do not match.");
    }

// 

     // Encrypt password
     //  $hashed_password = password_hash($password, PASSWORD_BCRYPT);
     // Insert $hashed_password into the database
     
     
     $gender = $_POST['gender'];
     $ph_no = $_POST['ph_no'];
     $caste = $_POST['caste'];
     $adress = $_POST['adress'];
     
    $hashed_password = password_hash($pswd, PASSWORD_BCRYPT);


$query = "INSERT INTO alldata 
(image_source, fname, lname, email, pswd, confirm_pswd, gender, ph_no, caste, adress) 
VALUES 
('$folder', '$fname', '$lname', '$email', '$hashed_password', '$confirm_pswd', '$gender', '$ph_no', '$caste', '$adress')";



    // $query = "INSERT INTO alldata VALUES('','$folder','$fname','$lname','$email','$pswd','$confirm_pswd','$gender','$ph_no','$caste','$adress')";
    // $data = mysqli_query($conn, $query);

    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "Data inserted successfully!";
        header('Location: login.php');
    } else {
        die("Error: " . mysqli_error($conn));  // Show MySQL error
    }
          
} 

?> 




