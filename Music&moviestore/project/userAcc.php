<!DOCTYPE html>
<html>
<head>
    <title>User Account Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .logout-btn {
            float: right;
            background-color: #f44336;
            margin-left: 10px;
        }
    </style>
</head>
<?php
session_start(); // Start the session

// Assuming you have established a database connection

// Fetch user data from the database
require ('../admin/config.php');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // User is logged in

    // Get the logged-in user's email from the session
    $loggedInUserEmail = $_SESSION['email'];

    // Prepare and execute the SQL query to fetch user data
    $sql = "SELECT f_name, l_name, email FROM registereduser WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $loggedInUserEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch the user's data
        $user = $result->fetch_assoc();
        $firstName = $user["f_name"];
        $lastName = $user["l_name"];
        $email = $user["email"];

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "User not found.";
        // Close the prepared statement
        $stmt->close();
        // Close the database connection
        $conn->close();
        exit();
    }

    // Check if the user clicked on the Log Out button
    if (isset($_POST['logout'])) {
        // Destroy the session and redirect to the login page
        session_destroy();
        header('../index.html');
        exit();
    }

    // Check if the user is viewing their own profile or another user's profile
    if (isset($_GET['user_id'])) {
        // Another user's profile is being viewed

        // Get the user ID from the query parameter
        $userId = $_GET['user_id'];

        // Prepare and execute the SQL query to fetch the other user's data
        $otherUserSql = "SELECT f_name, l_name, email FROM registereduser WHERE user_id = ?";
        $otherUserStmt = $conn->prepare($otherUserSql);
        $otherUserStmt->bind_param("i", $userId);
        $otherUserStmt->execute();
        $otherUserResult = $otherUserStmt->get_result();

        // Check if the other user exists
        if ($otherUserResult->num_rows > 0) {
            // Fetch the other user's data
            $otherUser = $otherUserResult->fetch_assoc();
            $otherUserFirstName = $otherUser["f_name"];
            $otherUserLastName = $otherUser["l_name"];
            $otherUserEmail = $otherUser["email"];

            // Close the prepared statement
            $otherUserStmt->close();
        } else {
            echo "User not found.";
            // Close the prepared statement
            $otherUserStmt->close();
            // Close the database connection
            $conn->close();
            exit();
        }
    }
    
    // Close the database connection
    $conn->close();
} else {
    // User is not logged in
    echo "Not logged in";
    exit();
}
?>

<html>
    <head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
    <div class="topnav">


<a href="../src/index.php" ><img src="../src/images/logo.jpeg" style="width: 130px;min-height: 60px;"></a>
<div class="wimg">
<a href="../src/index.php" >Home</a>
<a href="../src/music.php" >Music</a>
<a href="../src/movie.php" >Movie</a>
<a href="../src/myreviewdetails.php" readonly>Feedback</a>
<a href="../admin/contactus.html" >Contact us</a>

<a href="#" ><i class="fa fa-shopping-cart , color:white;" style="font-size:30px"></i></a>
</div>

</div>
        <h1>User Account Details</h1> 
        <div class="container">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" value="<?php echo $loggedInUserEmail === $email ? $firstName : $otherUserFirstName; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" value="<?php echo $loggedInUserEmail === $email ? $lastName : $otherUserLastName; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" value="<?php echo $loggedInUserEmail === $email ? $email : $otherUserEmail; ?>" disabled>
            </div>
            <?php if ($loggedInUserEmail === $email) { ?>
                <!-- Logged-in user's own profile -->
                <form method="post" action="updatepassword.php">
                    <div class="form-group">
                        <label for="newpassword">New Password:</label>
                        <input type="password" name="npass" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <button id="changePasswordBtn">Change Password</button>
                    </div>
                </form>
                <form method="post" action="logout.php">
                    <div class="form-group">
                        <button class="logout-btn" name="logout">Log Out</button>
                    </div>
                </form>
            <?php } ?>
        </div>
        <footer>
  <div class="footer-content">
    <div class="footer-section">
      <img src="../admin/image1.png" alt="" width="100px" height="100px">
      <p>Our mission is to empower creators worldwide to tell their stories through video. </p>
    </div>
    <div class="footer-section">
      <h3 class="fh">License & Terms</h3>
      <hr class="hr" style="width: 60%;margin-left: 0;"><br>
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Use</a></li>
       
      </ul>
    </div>
    <div class="footer-section">
      <h3 class="fh">Company</h3>
      <hr class="hr" style="width: 40%;margin-left: 0;"><br>
      <ul>
          <li><a href="../payment/aboutus.html"> About Us</a></li>
        <li><a href="../Contactus.html"> Contact Us</a></li>
      </ul>
    </div>
  </div>
  <div class="icon">
      <ul class="social-icons">
        <li><a  class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a class="dribbble" href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>   
      </ul>
    </div>
    
  <div class="footer-bottom">
    <p>&copy; 2023 Online Music and Movie Store. All rights reserved. | Designed by 666 STATION</p>
  </div>

</footer>
    </body>
</html>

</html>
