<?php
// error_reporting(0);

session_start();
?>

<?php include("connection.php");?>

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

<!-- 
                <div class="forgetpassword">
                    <a href="#" class="link">
                    <label>Forget Password</label>                                         
                    <input type="password" class="input" name="pswd" required>
                </div> -->


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




if(isset($_POST['login']))
// if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['email'];
    $password = $_POST['pswd'];

    $query = "SELECT pswd FROM alldata WHERE email='?'";
    $data = mysqli_query($conn, $query);


    if (!$data) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($data) > 0) {  
        $row = mysqli_fetch_assoc($data);
        $hashedpwd = $row['pswd'];
      
        // Debugging prints
        echo "<br>Entered Email: " . htmlspecialchars($username);
        echo "<br>Entered Password: " . htmlspecialchars($password);
        echo "<br>Stored Hashed Password: " . htmlspecialchars($hashedpwd);
    
            // Verify the hashed password
            if (password_verify($password, $hashedpwd)) {
                echo "<br>Password Match ";
                $_SESSION['username'] = $row['email'];
            header('Location:data.php'); // Change to your redirect page
                exit();
            } else {
                echo "Invalid Password!";
            }
        } else {
            echo "No user found with this email!";
        }



   // $row = mysqli_fetch_assoc($data);

    // if ($row && password_verify($password, $row['pswd'])) {
    //     $_SESSION['username'] = $username;
    //     header('location:data.php');
    // } else {
    //     echo "Invalid email or password!";
    // }
}





// if(isset($_POST['login']));
// {
//     $username = $_POST['email'];
//     $password = $_POST['password'];

//     $query = "SELECT * FROM alldata WHERE email='$username' && pswd ='$password'";
//    $data = mysqli_query($conn,$query); 
 
//    $total = mysqli_num_rows($data);
// //    echo $total;

//    if($total == 1)
//    {

//         $_SESSION['user_name']=$username;
//         header('location:data.php');
//    }
// }

?>