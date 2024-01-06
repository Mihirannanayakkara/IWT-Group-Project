<?php
require '../admin/config.php';

if (isset($_POST['password'])) {
    $newPassword = $_POST['password'];

    // Update the password in the "registereduser" table
    $sql = "UPDATE registereduser SET password='$newPassword'";
    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully";
    } else {
        echo "Error updating password: " . $conn->error;
    }
}

$conn->close();
?>
