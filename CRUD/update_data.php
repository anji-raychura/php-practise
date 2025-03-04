
<?php
session_start();
// error_reporting(0);
 include("connection.php");

// error_reporting(0);

$ID = $_GET['id'];

$userprofile = $_SESSION['username'];
if($userprofile == TRUE)
    {

    }
    else
    {
        header('location:login.php');
    }
$query = "SELECT * FROM alldata where Id='$ID' ";

$data = mysqli_query($conn,$query);

// $total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleee.css">
    <title>CRUD OPETRATION </title>
</head>
<body>                
    <div class ="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class ="title">
            Update Information 
        </div>
        <div class ="Form">



        <div class = "input_field">
                <label>IMAGE </label>
                <input type="file"  value=<?php echo $result['image_source']?>name="uploadfile" style="width:120%;" required>
            </div>

            <div class = "input_field">
                <label>First Name</label>
                <input type="text" value=<?php echo  $result['fname']?> class="input" name="fname" required>
            </div>
            <div class ="input_field">          
                <label>Last Name</label>                                       
                <input type="text"  value=<?php echo  $result['lname']?> class="input" name="lname" required>
            </div>
            <div class ="input_field">
                <label>Email</label>
                <input type="email"  value=<?php echo  $result['email']?> class="input" name="email" required>
            </div>                                   
            <!-- <div class ="input_field">
                <label>Password</label>                                         
                <input type="text"  value=<?php echo  $result['pswd']?> class="input" name="pswd" required>
            </div>
            <div class ="input_field">
                <label>confirm password</label>
                <input type="text"  value=<?php echo  $result['confirm_pswd']?> class="input" name="confirm_pswd" required>
            </div> -->
            <div class ="input_field">
                <label>Gender</label>
                <div class ="custom_select">

                <select name="gender" required>
                    <!-- <option>Select</option> -->

                    <option value="female"
                    <?php
                        if($result['gender'] == 'female')
                        {
                            echo "selected";
                        }
                    ?>
                    >Female</option>

                    <option value="male"

                    <?php                       
                        if($result['gender'] == 'male')
                        {
                           echo "selected";
                        }
                    ?>
                    >
                    Male</option>
                    <option value="other"
                    <?php
                        if($result['gender'] == 'Other')
                        {
                            echo "selected";
                        }
                    ?>
                    >
                    Other</option>
                </select>

                </div>
             </div>
             <div class ="input_field">
                <label>Phone No</label>
                <input type="text" value=<?php echo  $result['ph_no']?> class="input" name="ph_no" required>
            </div>
            <div class ="input_field">
                     <label>caste</label>
                    <div class="radio-label">
                        <input type="radio" name=caste value="Obc"id="OBC" required><label for="OBC">Obc</label>
                        <input type="radio" name=caste value="Sc" id="SC" required><label for="SC">Sc</label><br/>
                        <input type="radio" name=caste value="St"id="ST" required><label for="ST">St</label>
                        <input type="radio" name=caste value="General" id="general" required><label for="general">General</label>
                    </div>  
            </div>

            <div class ="input_field">
                <label>Adress</label>
                <textarea class="textarea" name="adress" required><?php echo $result['adress']?></textarea>
            </div>
            <div class ="input_field terms" required>
                <label class ="check">
                <input type="checkbox" name="terms">
                <span class="checkmark"></span>
                </label>
                <p> Agree to all the tearms and Conditions</p>
            </div>
            <div class ="input_field">
                <input type="submit" value="Update" class="btn" name="Update">
            </div>
        </div>
        </form>
    </div>
</body>
</html>             

<?php

if(isset($_POST['Update']))
{

    if (!isset($_POST['terms'])) {
        die("Error: You must agree to the terms and conditions.");
    }

    $filename =  $_FILES["uploadfile"]["name"];
    $tempname =  $_FILES["uploadfile"]["tmp_name"];
    $folder = "photu/".$filename;
    //move_uploaded_file($tempname, $folder);
   
    if (!move_uploaded_file($tempname, $folder)) {
       die("File upload failed!");
   }



    $fname = $_POST['fname'];   //we can also use diff var name
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    // $pswd = $_POST['pswd'];
    // $confirm_pswd = $_POST['confirm_pswd'];

    // if (strlen($pswd) < 5) {
    //     die("Error: Password must be at least 5 characters long.");
    // }
    // if ($pswd !== $confirm_pswd) {
    //     die("Error: Passwords do not match.");
    // }




    // $hashed_password = $pswd;  // Store password as plain text

    // if ($pswd === $result['pswd']) {
       
    //     $hashed_password = $result['pswd'];
    // } else {
    //     // નવું પાસવર્ડ આપ્યું હોય તો એન્ક્રિપ્ટ કરો
    //     $hashed_password = password_hash($pswd, PASSWORD_BCRYPT);
    //  //   $hashed_password = password_hash($_POST['pswd'], PASSWORD_BCRYPT);
    // }
    



    // Encrypt password before updating

    $gender = $_POST['gender'];
    $ph_no = $_POST['ph_no'];
    $caste = $_POST['caste'];
    $adress = $_POST['adress'];


    $query = "UPDATE alldata SET image_source='$folder', fname='$fname', lname='$lname', email='$email',
                gender='$gender', ph_no='$ph_no', adress='$adress', caste='$caste' WHERE Id='$ID'";


    $data = mysqli_query($conn,$query);
   
        if(!$data)
        {
            echo "Failed update" . mysqli_error($conn);;    
        }

        else
        {  

             ?>
            <!-- auto refresh..with  content second 3 second anmd directly display to link -->
            <meta http-equiv = "refresh" content = "0; url =            
                http://localhost/allfiles/CRUD/data.php"/>

            <?php 

            echo "Data Updated";
        }
}
?>         