<?php


// Get the new password from the request data
$newPassword = $_POST["npass"];

// password change 
// You need to replace 'username' and 'password' with your actual database credentials
require ('../admin/config.php');



// Check if the newPassword value is set and not empty
if (isset($newPassword) && !empty($newPassword)) {
    $sql = "UPDATE registereduser SET password = ' $newPassword  ' WHERE user_id = 1";
    // Replace 'id' with the appropriate column name for identifying the user

    if ($conn->query($sql) === true) {
        echo "Password changed successfully!";
    } else {
        echo "Error occurred while changing password. Please try again later.";
    }
} else {
    echo "Invalid password input.";
}




?>
