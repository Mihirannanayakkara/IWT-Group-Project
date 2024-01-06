<?php 
require('../admin/config.php');

$searchKeyword = "";

if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];
}

$sql = "SELECT * FROM movie";
if (!empty($searchKeyword)) {
    $sql .= " WHERE Name LIKE '%$searchKeyword%'";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/scripting.js"></script>

    <link rel="stylesheet" href="styles/style.css">

    <link rel="stylesheet" href="styles/musicstyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>movie library</title>
</head>
<body>

<div class="topnav">


            <a href="index.php" ><img src="../admin/images/logo.jpeg"style="width: 130px;min-height: 60px;"></a>
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




<center><div class="MMname">Categories</div></center>
<div class="Mcategory">
  <div><a href="horror.php" ><img src="images/horror.jpg"></a></div> 
  <div><a href="action.php" ><img src="images/action.jpg"></a></div>
  <div><a href="kids.php" ><img src="images/kids.jpg"></a></div>

</div>

<form method="GET" action="movie.php" class="search" >
        <input type="text" name="search" placeholder="Search By Name..." value="<?php echo $searchKeyword; ?>" style="align-text:right;">
        <button type="submit"><i class="fa fa-search"></i></button>
</form>


<main>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <div class="banner">
            <div class="bimage">
                <img src="../admin/img/<?php echo $row["Picture"]; ?>">
            </div>
            <div class="bcaption">
                <p><?php echo $row["Name"]; ?></p>
                <p><b>$<?php echo $row["Price"]; ?></b></p>
            </div>
            <button onclick="window.location.href='movie_details.php?id=<?php echo $row['MovieID']; ?>'" class="explore">Explore</button>
        </div>
        <?php
            }
        } else {
            echo "No records found";
        }
        ?>
    </main>


<footer>
    <div class="footer-content">
      <div class="footer-section">
        <img src="../admin/image1.png" alt="" width="100px" height="100px">
        <p>Our mission is to empower creators worldwide to tell their stories through video. </p>
      </div>
      <div class="footer-section">
        <h3>License & Terms</h3><br>
        <ul>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Use</a></li>
         
        </ul>
      </div>
      <div class="footer-section">
        <h3>Company</h3><br>
        <ul>
            <li><a href="#"> About Us</a></li>
          <li><a href="#"> Contact Us</a></li>
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


    

