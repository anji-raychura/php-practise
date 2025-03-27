<?php
session_start();
include("connection.php");

if (!isset($_GET['token'])) {
    die("Invalid or missing token!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $token = $_GET['token'];

    // Basic validation
    if ($new_password !== $confirm_password) {
        echo "<p style='color:red;'> Passwords do not match!</p>";
    } elseif (strlen($new_password) < 5) {
        echo "<p style='color:red;'> Password must be at least 5 characters long.</p>";
    } else {
        // Encrypt the new password
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update in the database
        $query = "UPDATE alldata SET pswd=?, confirm_pswd=?,WHERE reset_token=?";
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt)
         {
                die("Query preparation failed: " . mysqli_error($conn));
        }
    mysqli_stmt_bind_param($stmt, "sss", $hashed_password, $confirm_password, $token);

        // $query = "UPDATE alldata SET pswd=?, reset_token=NULL WHERE reset_token=?";
        // $stmt = mysqli_prepare($conn, $query);

        // if (!$stmt) {
        //     die("Query preparation failed: " . mysqli_error($conn));
        // }
        // mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $token);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirect to login page with a success flag
            header("Location: login.php?reset=success");
            exit();
        } else {
            echo "<p style='color:red;'> Invalid or expired token!</p>";
        }
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
    <form method="POST">
        <h2>Reset Password</h2>
        <label>New Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>

        <button type="submit" name="submit">Reset Password</button>
    </form>
</body>
</html>


