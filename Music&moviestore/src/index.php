<?php
require '../admin/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    

    <link rel="stylesheet" href="styles/style.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="js/scripting.js"></script>
 
    <title>Document</title>

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

 
 <div class="topnav">
    
    </div>

    <center>
        <div class="slider">
            <div class="images">
                <input type="radio" name="slide" id="img1" checked>
                <input type="radio" name="slide" id="img2">
                <input type="radio" name="slide" id="img3">
                <input type="radio" name="slide" id="img4">
                <img class="m1" src="images/slideshow.jpg">
                <img class="m2" src="images/slideshow23.jpg">
                <img class="m3" src="images/slideshow22.jpg">
                <img class="m4" src="images/slideshow4.jpg">
            </div>
            <div class="dots">
                <label for="img1"></label>
                <label for="img2"></label>
                <label for="img3"></label>
                <label for="img4"></label>
            </div>
        </div>
    </center>

    <div class="umma">
        
    </div>

    
    


    <div class="umma">
          <a href="movie.php">
              <div class="card">
                    <h2>MOVIE</h2>
              </div>
          </a>

          <a href="music.php">
          <div class="card">
              <h2>MUSIC</h2>
          </div>
        </a>
    </div>
    
    
   <p class="Mnames">POPULAR MUSIC</p>
  
   <div class="Mmovie">

      <div><a href="music.php"><img src="images/weekend.jpg" alt="Movie Poster" ></a>
            <div class="name">Star Boy</div>
      </div>

      <div><a href="music.php"><img src="images/abba.jpg" alt="Movie Poster" ></a>
            <div class="name">Gimme Gimme</div>
      </div>

      <div><a href="music.php"><img src="images/akon.jpeg" alt="Movie Poster" ></a>
          <div class="name">Smack That</div>
    </div>
    <div><a href="music.php"><img src="images/intheend.jpg" alt="Movie Poster" ></a>
          <div class="name">In The End</div>
    </div>
    <div><a href="music.php"><img src="images/sick.jpg" alt="Movie Poster" ></a>
          <div class="name">Something Just Like This</div>
    </div>
 
  </div><br><br><br><br>


  <p class="Mnames">POPULAR MOVIE</p>

  <div class="Mmovie">

  <div><a href="movie.php"><img src="images/spy.jpg" alt="Movie Poster" ></a>
  <div class="name">Spy Kid's</div>
  </div>


   <div><a href="movie.php"><img src="images/IT.jpeg" alt="Movie Poster" >
   <div class="name">IT</div>
   </div>


   <div><a href="movie.php"><img src="images/Jonny.jpeg" alt="Movie Poster" >
   <div class="name">Jonny English</div>
   </div>


   <div><a href="movie.php"><img src="images/dog.jpg"  alt="Movie Poster" ></a>
   <div class="name">Cat & Dogs</div>
   </div>
 
 </div>

 <p class="Mnames">UPCOMMING</p>
 <br>
 <div class="Mmovie">
<div><img src="images/trans.jpg" alt="Movie Poster" >
    <div class="name">Transformers 7</div>
  </div>
  <div><img src="images/Spiderman.jpg" alt="Movie Poster" >
    
    <div class="name">Ant-Man and the Wasp</div>
  </div>
  <div><img src="images/eminder.jpg" alt="Movie Poster" >
    
    <div class="name">Reminder:Weekend</div>
  </div>
  <div><img src="images/spongbob.jpg"  alt="Movie Poster" ></a>
      
      <div class="name">Spongebob</div>
    </div>

</div>




<div class="review-box">
    <h2>User Reviews</h2>
    <?php
    // Fetch all reviews from the database
    $sql = "SELECT * FROM reviews ORDER BY datetime DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="review">
                <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                <p><strong>Rating:</strong> <?php echo $row['rating']; ?></p>
                <p><strong>Comment:</strong> <?php echo $row['comments']; ?></p>
                <p><strong>Date:</strong> <?php echo $row['datetime']; ?></p>
            </div>
            <?php
        }
    } else {
        echo "<p>No reviews yet.</p>";
    }
    ?>
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
        <li><a href="../project/privacy.html">Privacy Policy</a></li>
        <li><a href="../project/terms.html">Terms of Use</a></li>
       
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
<script>
    // Slideshow functionality
    const images = document.querySelector('.slider .images');
    const imageInputs = document.querySelectorAll('.slider .images input[type="radio"]');
    const dots = document.querySelectorAll('.slider .dots label');

    let index = 0;
    let interval;

    // Function to change the slide
    function changeSlide() {
        index++;
        if (index >= imageInputs.length) {
            index = 0;
        }
        images.style.transform = `translateX(-${index * 100}%)`;

        // Update active dot
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    // Start the slideshow
    function startSlideshow() {
        interval = setInterval(changeSlide, 2000);
    }

    // Stop the slideshow
    function stopSlideshow() {
        clearInterval(interval);
    }

    // Event listeners
    imageInputs.forEach((input) => {
        input.addEventListener('focus', stopSlideshow);
        input.addEventListener('blur', startSlideshow);
    });

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            index = i;
            images.style.transform = `translateX(-${index * 100}%)`;
            dots.forEach((dot, j) => {
                dot.classList.toggle('active', j === index);
            });
        });
    });

    // Start the slideshow when the page loads
    startSlideshow();
</script>



</body>
</html>