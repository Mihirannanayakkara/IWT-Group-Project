<?php
require 'config.php';

if (isset($_POST['upload'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Check if a new image is uploaded
    if ($_FILES['image']['name'] !== '') {
        $size = $_FILES['image']['size'];
        $temp = $_FILES['image']['tmp_name'];
        $type = $_FILES['image']['type'];
        $picture = $_FILES['image']['name'];

        // Delete the old image file if it exists
        $sql = "SELECT Picture FROM music WHERE MusicID='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $oldPicture = $row['Picture'];
            if ($oldPicture !== '') {
                unlink("img/$oldPicture");
            }
        }

        // Upload the new image
        move_uploaded_file($temp, "img/$picture");
    } else {
        // No new image uploaded, keep the existing image
        $sql = "SELECT Picture FROM music WHERE MusicID='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $picture = $row['Picture'];
        }
    }

    $sql = "UPDATE music SET Name='$name', Picture='$picture', Category='$category', Price='$price', Description='$description' WHERE MusicID='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        echo "<script>alert('Record Updated Successfully')
        window.location.replace('Adminmusic.php');</script>";
        
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>