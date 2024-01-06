<?php
include_once 'config.php';

$id = $_GET['id'];

// Retrieve the photo filename before deleting the row
$sql = "SELECT Picture FROM movie WHERE MovieID='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$picture = $row['Picture'];

// Delete the row from the table
$query = "DELETE FROM movie WHERE MovieID='$id'";
if (mysqli_query($conn, $query)) {
    // Delete the associated photo file
    if (!empty($picture) && file_exists("img/$picture")) {
        unlink("img/$picture");
    }

    echo "<script>alert('Record Deleted Successfully')
    window.location.replace('Adminmovie.php');</script>";
    
} else {
    echo "<script>alert('Error In Delete')</script>";
}

mysqli_close($conn);
?>