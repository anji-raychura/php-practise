<?php
session_start();
include("connection.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login2.php"); // Redirect to login page if session is not set
    exit();
}

// $userprofile = $_SESSION['username'];

$query = "SELECT * FROM alldata";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total > 0) {
?>
    <table border="3px">
        <tr>
            <th>ID</th>
            <th>IMAGE</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Password</th>
            <th>Confirm_Password</th>
            <th>Gender</th>
            <th>Ph_no</th>
            <th>Caste</th>
            <th>Address</th>
            <th>Action</th>
        </tr>

<?php
    while ($result = mysqli_fetch_assoc($data)) {
        echo "<tr>
                <td>".$result['Id']."</td>
                <td><img src='".$result['image_source']."' width='50px' height='50px'></td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>".$result['pswd']."</td>
                <td>".$result['confirm_pswd']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['ph_no']."</td>
                <td>".$result['caste']."</td>
                <td>".$result['adress']."</td>
                <td>
                    <a href='update_data.php?id=$result[Id]'>
                        <button class='button'> UPDATE </button>
                    </a>
                    <a href='delete_data.php?id=$result[Id]'>
                        <button class='button2' onclick='return checkdate()'> DELETE </button>
                    </a>
                </td>
            </tr>";
    }
} else {
    echo "There is no record.";
}
?>
    </table>
      
    <a href="logout.php">
        <input type="submit" value="Logout" style="background: blue; color: white; height:35px; width:100px; margin-top:20px;
                font-size: 18px; border:0; border-radius:5px; cursor:pointer;">
    </a>

<script>
    function checkdate() {
        return confirm('Are you sure you want to delete?');
    }
</script>

