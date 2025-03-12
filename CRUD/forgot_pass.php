
<?php
session_start();
error_reporting(0);
include("connection.php");


require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if email exists
    $query = "SELECT * FROM alldata WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));

        // Store token in the database
        $updateQuery = "UPDATE alldata SET reset_token=? WHERE email=?";  
        $stmt = mysqli_prepare($conn, $updateQuery);
        
        if (!$stmt) {
            die("Update query preparation failed: " . mysqli_error($conn));
        }
          
       // $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ss", $token, $email);
        mysqli_stmt_execute($stmt);


        // Send reset link to user's email
        $reset_link = "http://localhost/allfiles/CRUD/reset_password.php?token=$token";







                $subject = "Password Reset Request";
        $message = "Click the link below to reset your password: $reset_link";
        $headers = "From: noreply@yourwebsite.com";

        if (mail($email, $subject, $message, $headers)) {              
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Email not found!";
    }
}

  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Forgot Password</h2>
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="submit">Send Reset Link</button>
    </form>
</body>
</html>
