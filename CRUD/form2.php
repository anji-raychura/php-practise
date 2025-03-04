


<?php include("connection.php");?> 


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
        <form action="login.php" method="POST" enctype="multipart/form-data">
        <div class ="title">
            Registration Form 
        </div>
        <div class ="Form">

           <div class = "input_field">
                <label>IMAGE </label>
                <input type="file" name="uploadfile" style="width: 120%;">
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
                    <option>Select</option>
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
                        <input type="radio" name="caste" value="Obc" id="OBC" required><lable for="OBC">Obc</label>
                        <input type="radio" name="caste" value="Sc"  id="SC" required><lable for="SC">Sc</label><br/>
                        <input type="radio" name="caste" value="St"  id="ST" required><lable for="ST">St</label>
                        <input type="radio" name="caste" value="General" id="general" required><lable for="general">General</label>
                    </div>  
            </div>
            <div class ="input_field">          
                <label>Adress</label>
                <textarea class="textarea" name="adress" required></textarea>         
            </div>
            <div class ="input_field terms" required>
                <label class ="check">
                <input type="checkbox">
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
include("connection.php"); 

if(isset($_POST['register'])) {
    // File upload
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "photu/" . $filename;                                                          
    move_uploaded_file($tempname, $folder);
 
    // Form inputs
    $fname = $_POST['fname'];
     $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    $confirm_pswd = $_POST['confirm_pswd'];
    $gender = $_POST['gender'];
    $ph_no = $_POST['ph_no'];
    $caste = $_POST['caste'];
    $adress = $_POST['adress'];

    // **Validations**

    // Phone Number (Only 10 digits)
    if (!preg_match("/^[0-9]{10}$/", $ph_no)) {
        echo "<p style='color:red;'>Phone number must be exactly 10 digits.</p>";
        exit;
    }

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Invalid email format.</p>";
        exit;
    }

    // Password Validation (At least 6 characters, contains at least 3 digits)
    if (strlen($pswd) < 6) {
        echo "<p style='color:red;'>Password must be at least 6 characters long.</p>";
        exit;
    }

    if (preg_match_all('/[0-9]/', $pswd) < 3) {
     echo "<p style='color:red;'>Password must contain at least 3 digits.</p>";
        exit;
    }

    // Confirm Password Check
    if ($pswd !== $confirm_pswd) {
        echo "<p style='color:red;'>Passwords do not match.</p>";
        exit;
    }

    // If everything is valid, insert into database
    $query = "INSERT INTO alldata VALUES('', '$folder', '$fname', '$lname', '$email', '$pswd', '$confirm_pswd', '$gender', '$ph_no', '$caste', '$adress')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<p style='color:green;'>Data inserted successfully!</p>";
    } else {
        echo "<p style='color:red;'>Failed to insert data.</p>";
    }
}
?>
