<?php

include("../admin/config.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/detailstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="JS/script.js"></script>
    <title>Music Detail Page</title>
</head>
<body>
  
<div class="topnav">


            <a href="index.php" ><img src="../admin/images/logo.jpeg" style="width: 130px;min-height: 60px;"></a>
            <div class="wimg">
            <a href="index.php" >Home</a>
            <a href="music.php" >Music</a>
            <a href="movie.php" >Movie</a>
            <a href="myreviewdetails.php" readonly>Feedback</a>
            <a href="../admin/contactus.html" >Contact us</a>
            <a href="../project/userAcc.php" ><i class='fa fa-user-circle' style="font-size:30px ;"></i></a>
            <a href="../cart/cart.php" ><i class="fa fa-shopping-cart , color:white;" style="font-size:30px"></i></a>
            </div>
            
</div>

  <?php

  if (isset($_GET['id'])) {
    $movieID = $_GET['id'];

    // Retrieve the movie details from the database
    $sql = "SELECT * FROM movie WHERE MovieID = $movieID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image=$row['Picture'];
        $name = $row['Name'];
        $price = $row['Price'];
        $description = $row['Description'];

    ?>
        
        
        

    <div class="movie-details">
    
    <?php echo"<img src='../admin/img/". $row["Picture"]. "'class='movie-image' >"?>

    </div>
    <div class=carddetails>
    <div class="cartdetailsname">
    <h1><?php echo $row["Name"]; ?></h1>
    <h1><b><?php echo "Price : $". $row['Price']; ?></b></h1>
    </div>

    <div class="cartcard">
      <p><?php echo $row["Description"]; ?></p>
     
      <button onclick="window.location.href='../cart/cart.php?id=<?php echo $row['MovieID']; ?>'" class="explore">Add to cart</button>
      
    </div>
    </div>
 

    <?php
    } 
    else {
        echo "Movie not found.";
    }
} else {
    echo "Invalid movie ID.";
}

// Close the database connection
$conn->close();
?>
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

