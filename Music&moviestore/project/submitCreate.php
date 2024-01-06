
<?php
   require '../admin/config.php';

if(isset($_POST['submit']))
{
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mail'];
    $pwd1 = $_POST['pwd1'];
    

    $sql = "INSERT INTO registereduser (f_name, l_name, email, password) VALUES ('$fname', '$lname', '$mail', '$pwd1')";
    
    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Record inserted successfully!')</script>";
        header("location: log.html");
        exit();
    }
    else {
        echo "<script>alert('Error')</script>";
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>
