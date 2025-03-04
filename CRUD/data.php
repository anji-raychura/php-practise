<link rel="stylesheet" href="style3.css">


<?php
session_start();

include("connection.php");
    //error_reporting(0);

    $userprofile = $_SESSION['username'];

    if($userprofile == TRUE)
    {

    }
    else
    {
        header('location:login.php');
    }

$query = "SELECT * FROM alldata";

$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

// $result = mysqli_fetch_assoc($data);   // return data into Array forms 



// echo "$total";
if($total != 0)
{

?>
    <table border="3px">
            <tr>
               <th>ID</th>
               <th>IMAGE</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Pasword</th>
                <th>confirm_Password</th>
                <th>Gender</th>
                <th>Ph_no</th>
                <th>Caste</th>
                <th>Adress</th>
                <th>Action</th>
            </tr>

<?php
    while($result = mysqli_fetch_assoc($data))
    {
echo "<tr>
        <td>".$result['Id']."</td>
          <td><img src = '".$result['image_source']."' width='50px' height='50px'</td>
        <td>".$result['fname']."</td>
        <td>".$result['lname']."</td>
        <td>".$result['email']."</td>
        <td>".$result['pswd']."</td>
        <td>".$result['confirm_pswd']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['ph_no']."</td>
        <td>".$result['caste']."</td>
        <td>".$result['adress']."</td>

        <td> <a href='update_data.php?id=$result[Id]'>
        <button class='button'> UPDATE </button></a> 

             <a href='delete_data.php?id=$result[Id]'>
             <button class='button2' onclick = 'return checkdate()'> DELETE </button></a> 
        </td>

    </tr>
    ";           
    }
}
else{
   echo "there is no record";
}
?>
</table>
      
<a href="logout.php">

<input type="submit" value="Logout" name=""  style="background: blue; color: white; height:35px; width:100px; margin-top:20px;
                font-size: 18px; border:0; border-radius:5px; cursor:pointer;">
</a>

<!-- echo $result['fname']." ".$result['lname']." ".$result['email']." ".$result['pswd']." ".$result['confirm_pswd']." ".$result['gender']." ".$result['ph_no']." ".$result['adress']."<br>";    -->
<script>

    function checkdate()
    {
        return confirm('Are Youy sure want to delete ?');
    }
</script>   