<?php
require '../admin/config.php';
// Retrieve the email and password from the form
$email = $_POST['mail'];
$password = $_POST['pwd'];



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query
$stmt = $conn->prepare("SELECT * FROM registereduser WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists and password matches
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    $storedUsername=$user['email'];
    $storedPassword = $user['password']; 
    // Replace 'password' with the actual column name 
    if ($password === $storedPassword) {
        // Password matches, valid login
        session_start(); // Start the session
        $_SESSION['email'] = $email; // Store the email in the session
        echo "<br>Login successful!";
        echo "<script>window.location.replace('../src/index.php');</script>";
        
        
    } 
    
    
    
    else {
        // Password doesn't match
        echo "<script>alert('Invalid login!');
        window.location.replace('log.html');</script>";
    }
}
elseif($email="admin@station.lk" &&  $password="11111111")
    {
        echo "<script>alert('Hello Admin!');
        window.location.replace('../admin/Admindash.php');</script>";
    }
 else {
    // User doesn't exist
    echo "<script>alert('Invalid login<br>User does not exist!')</script>";
}

$stmt->close();
$conn->close();
?>

