<?php
require 'config.php';
$id = $_GET['id'];

$sql = "SELECT * FROM Music WHERE MusicID = '$id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    $name = $row["Name"];
    $picture = $row["Picture"];
    $category = $row["Category"];
    $price = $row["Price"];
    $description = $row["Description"];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Admindash.css">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/Admindash.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>666 STATION</title>
</head>
<body>
<div class="topnav">


<a href="../src/index.php" ><img src="images/logo.jpeg" style="width: 130px;min-height: 60px;"></a>
<div class="wimg">
<a href="../src/index.php" >Home</a>
<a href="../src/music.php" >Music</a>
<a href="../src/movie.php" >Movie</a>
<a href="../src/myreviewdetails.php" readonly>Feedback</a>
<a href="contactus.html" >Contact us</a>
<a href="../project/indexreg.html" >Log out</a>

</div>

</div>
<br><br><br>
    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="fa fa-navicon"></i> </button>
    </div>
    <div class="sidebar" id="mySidebar">
  <div class="side-header">
      <img src="images/user.jpg" width="120" height="120" alt="Swiss Collection"> 
      <h5 style="margin-top:10px;">Hello, Admin</h5>
  </div>
  
  <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
      <a href="#" class="closebtn" onclick="closeNav()"><i class="fa fa-close"></i></a>
      <a href="Admindash.php" ><i class="fa fa-home"></i> Dashboard</a>
      <a href="Admindash.php"   ><i class="fa fa-users"></i> Customers</a><br>
      <a href="#"   ><i class="fa fa-th-large"></i> Category</a>
      <ul class="cate">
        <li><a href="Adminmusic.php"><i class="fa fa-music"></i> Music</a></li>
        <li><a href="Adminmovie.php"><i class="fa fa-film"></i>  Movies</a></li></ul>
      
</div>
    <!---->
  </div>
    <center><h1 class="topic" style="font-size: 40px;">Add Music</h1><br><br><br>
  
    <form action="Updatemusic.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <label >Music Name : </label>
        <input type="text" name="name" value="<?php echo "$name" ?>" required><br>
        <label >Picture : </label>
        <input type="file" name="image" ><br>
        <img src="img/<?php echo "$picture" ?>" style="width:80px;height:60px">
        <label >Music Category : </label>
        <select name="category">
            <option value="hiphop" <?php if ($category == 'hiphop') echo 'selected'; ?>>Hip Hop</option>
            <option value="rock" <?php if ($category == 'rock') echo 'selected'; ?>>Rock</option>
            <option value="classic" <?php if ($category == 'classic') echo 'selected'; ?>>Classic</option>
        </select><br>
        <label >Music Price : </label>
        <input type="number" name="price"  min="0"  step="0.01"value="<?php echo "$price" ?>" required><br>
        <label >Music Description : </label><br>
        <textarea name="description"  cols="30" rows="10" ><?php echo "$description" ?></textarea><br>
        <button type="submit" name="upload">Add Music</button>


    </form></center>
    <footer>
      <div class="footer-content">
        <div class="footer-section">
          <img src="image1.png" alt="" width="100px" height="100px">
          <p>Our mission is to empower creators worldwide to tell their stories through video. </p>
        </div>
        <div class="footer-section">
          <h3>License & Terms</h3>
          <hr class="hr"><br>
          <ul>
          <li><a href="../project/privacy.html">Privacy Policy</a></li>
        <li><a href="../project/terms.html">Terms of Use</a></li>
           
          </ul>
        </div>
        <div class="footer-section">
          <h3>Company</h3><hr class="hr"><br>
          <ul>
          <li><a href="../payment/aboutus.html"> About Us</a></li>
        <li><a href="contactus.html"> Contact Us</a></li>
          </ul>
        </div>
      </div>
      <div class="icon">
          <ul class="social-icons">
          <li><a  class="facebook" href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
        <li><a class="twitter" href="https://www.twitter.com"><i class="fab fa-twitter"></i></a></li>
        <li><a class="dribbble" href="https://www.instergram.com"><i class="fab fa-instagram"></i></a></li>
        <li><a class="linkedin" href="https://www.linked-in.com"><i class="fab fa-linkedin-in"></i></a></li> 
          </ul>
        </div>
        
      <div class="footer-bottom">
        <p>&copy; 2023 Online Music and Movie Store. All rights reserved. | Designed by 666 STATION</p>
      </div>

    </footer>
</body>
</html>