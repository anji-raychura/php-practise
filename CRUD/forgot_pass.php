
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
        $reset_link = "http://localhost/allfiles/CRUD/reset_pass.php?token=$token";




        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();                                  
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;                       
            $mail->Username = 'anjaliraychura1@gmail.com';    
            $mail->Password = 'xafmqbwezcbozhyq';      
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;                           

            // Recipients
            $mail->setFrom('anjali@gmail.com', 'test Mailer');
            $mail->addAddress($email);                  

            // Content
            $mail->isHTML(true);                         
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Click the link below to reset your password: <a href='$reset_link'>$reset_link</a>";

            // Send the email
            $mail->send();
            echo "Password reset link has been sent to your email.";
        } catch (Exception $e) {
            echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
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
