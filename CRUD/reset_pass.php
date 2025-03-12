<?php
session_start();
include("connection.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    die("Invalid token!");
}

if (isset($_POST['submit'])) {
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        die("Passwords do not match!");
    }

    if (strlen($new_password) < 5) {
        die("Password must be at least 5 characters long.");
    }

    // Encrypt new password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update password in the database
    $query = "UPDATE alldata SET pswd=?, reset_token=NULL WHERE reset_token=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $token);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Password updated successfully!";
        echo "<a href='login.php'>Go to Login</a>";
    } else {
        echo "Invalid or expired token!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Reset Password</h2>                                                                                         
        <label>New Password:</label>
        <input type="password" name="password" required>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        <button type="submit" name="submit">Reset Password</button>
    </form>
</body>
</html>
