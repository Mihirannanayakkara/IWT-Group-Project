<?php
include_once 'config.php';

// Get the User_name from the query string
$user = $_GET['id'];

// Delete the row from the table
$query = "DELETE FROM registereduser WHERE user_id='$user'";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Record Deleted Successfully');
    window.location.replace('Admindash.php');</script>";
} else {
    echo "<script>alert('Error In Delete: " . mysqli_error($conn) . "');</script>";
}

mysqli_close($conn);
?>