<?php
require('../admin/config.php');

// Retrieve the review ID from the URL parameter
if (isset($_GET['id'])) {
    $reviewId = $_GET['id'];

    // Fetch the review from the database
    $sql = "SELECT * FROM reviews WHERE id = $reviewId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $rating = $row['rating'];
        $comments = $row['comments'];
    } else {
        echo "Review not found.";
        exit();
    }
} else {
    echo "Invalid review ID.";
    exit();
}

// Update review in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $updateSql = "UPDATE reviews SET name = '$name', email = '$email', rating = '$rating', comments = '$comments' WHERE id = $reviewId";

    if ($conn->query($updateSql) === TRUE) {
        echo "<script>alert('Review updated successfully!');
        window.location.replace('myreviewdetails.php');</script>";
        exit();
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<html>
<head>
    
    <link rel="stylesheet" href="styles/style.css">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

    </div>

<div class="form-container">
    <h2 class="form-title" >Edit Review</h2>
    
    <form method="POST" action="">
       
            <label class="form-label" >Name:</label>
            <input class="form-input" type="text"  id="name" name="name" value="<?php echo $name; ?>">
       
       
            <label class="form-label">Email:</label>
            <input class="form-input" type="email" id="email" name="email" value="<?php echo $email; ?>">
      
        
            <label class="form-label">Rating:</label>
            <input class="form-input" type="number" id="rating" name="rating" min="1" max="5" value="<?php echo $rating; ?>">
        
        
            <label class="form-label">Comments:</label>
            <textarea class="form-input" id="comments" name="comments"><?php echo $comments; ?></textarea>
      
        <button class="form-submit" type="submit">Update</button>
    </form>


</div>

<footer>
  <div class="footer-content">
    <div class="footer-section">
      <img src="../images/logo.png" alt="" width="100px" height="100px">
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
