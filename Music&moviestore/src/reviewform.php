<?php

    require('../admin/config.php');

    // Insert user review into the database
    if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (id,name,email,rating,comments,datetime) VALUES ('','$name', '$email', $rating, '$comment', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Review submitted successfully!');
        window.location.replace('myreviewdetails.php');</script>";

    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}


?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>

<div class="topnav">


            <a href="index.html" ><img src="../admin/images/logo.jpeg" style="width: 130px;min-height: 60px;"></a>
            <div class="wimg">
            <a href="index.html" >Home</a>
            <a href="music.php" >Music</a>
            <a href="movie.php" >Movie</a>
            <a href="myreviewdetails.php">Feedback</a>
            <a href="../admin/contactus.html" >Contact us</a>
            <a href="../project/userAcc.php" ><i class='fa fa-user-circle' style="font-size:30px ;"></i></a>
            <a href="../cart/cart.php" ><i class="fa fa-shopping-cart , color:white;" style="font-size:30px"></i></a>
            </div>
            
</div>

    <div class="form-container">
        <h2 class="form-title">Leave a Review</h2>
        <form action="" method="post">
            <label class="form-label" for="name">Name:</label>
            <input class="form-input" type="text" name="name" required>

            <label class="form-label" for="email">Email:</label>
            <input class="form-input" type="email" name="email" required>

            <label class="form-label" for="rating">Rating:</label>
            <select class="form-input" name="rating" required>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>

            <label class="form-label" for="comment">Comment:</label>
            <textarea class="form-input" name="comment" rows="4" cols="30" required></textarea>

            <input class="form-submit" type="submit" name="submit" value="Submit">
        </form>
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