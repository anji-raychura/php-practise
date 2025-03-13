<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <title>CRUD OPERATION</title>
</head>
<body>       
    <div class="container">
    <form action="" method="POST" autocomplete="off">
            <div class="title">
                Log in
            </div>      

            <div class="Form">
                <!-- <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" required>
                </div> -->
    
                <div class="input_field">
                    <label>Email</label>
                    <input type="email" class="input" name="email" required>
                </div> 

                <div class="input_field">
                    <label>Password</label>                                         
                    <input type="password" class="input" name="pswd" required>
                </div>



                <div class="forgetpassword">                                             
                 <a href="forgot_pass.php" class="link">Forgot Password?</a>                                         
                </div>


                <!-- <div class="forgetpassword">                                             
                    <a href="#" class="link">
                    <label>Forget Password</label>                                         
                    
                </div>  -->


                <!-- Add a submit button -->
                <div class="input_field">
                    <input type="submit" value="Log in" class="btn" name="login">
                </div>

                    <!-- <div class="signup">New member ? <a href="#" class="link">
                        Signup Here</a>
                    </div> -->
            </div>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['login']))
 {
    // Get user input & sanitize
    $username = $_POST['email'];
    $password = $_POST['pswd'];

    // // Ensure password is not empty
    // if (empty($password)) {
    //     echo "Password cannot be empty!";
    //     exit();
    // }

    // Use prepared statement to prevent SQL Injection
    $query = "SELECT pswd FROM alldata WHERE email = ?";
    $check = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($check, "s", $username);
    mysqli_stmt_execute($check);
    $result = mysqli_stmt_get_result($check);   
    $row = mysqli_fetch_assoc($result);
    print_r($row);
   
    if ($row)
    {
        $hashedpwd = $row['pswd']; // Hashed password from DB
        
        // Verify password
        if (password_verify($password, $hashedpwd))
        {
            $_SESSION['username'] = $username;

            header("Location: data.php");
            exit();
        } else
         {
            echo "no user Founds";
            // exit();
         }
    } 
    else
     {
        echo "<script>alert('No user found with this email!'); window.location.href='login.php';</script>";

        // exit();
     }
     if (isset($_GET['reset']) && $_GET['reset'] == 'success') {
    echo "<p style='color: green;'>✔ Password updated successfully. Please log in with your new password.</p>";
}
    mysqli_stmt_close($check);
    mysqli_close($conn);
}
?>