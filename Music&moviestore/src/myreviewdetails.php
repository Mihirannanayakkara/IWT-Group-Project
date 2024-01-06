<?php
require('../admin/config.php');
session_start();

// Fetch all reviews from the database
$sql = "SELECT * FROM reviews ORDER BY datetime DESC";
$result = $conn->query($sql);

if (isset($_SESSION['email'])) {
    // Delete user review from the database
    if (isset($_GET['delete'])) {
        $reviewId = $_GET['delete'];

        $deleteSql = "DELETE FROM reviews WHERE id = $reviewId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "<script>alert('Review deleted successfully!');
            window.location.href='myreviewdetails.php'</script>";
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
            <a href="myreviewdetails.php">Feedback</a>
            <a href="../admin/contactus.html" >Contact us</a>
            <a href="../project/userAcc.php" ><i class='fa fa-user-circle' style="font-size:30px ;"></i></a>
            <a href="../cart/cart.php" ><i class="fa fa-shopping-cart , color:white;" style="font-size:30px"></i></a>

            </div>
        </div>

        <button class="add-btn" onclick="window.location.href='reviewform.php'" value="Add Review">ADD YOU'r REVIEW</button>

        <div class="review-box">
        <h2>User Reviews</h2>

        <!-- Display user reviews -->
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display the review only if it belongs to the logged-in user
                if ($row['email'] === $_SESSION['email']) {
                    ?>
                    <div class="review">
                        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                        <p><strong>Rating:</strong> <?php echo $row['rating']; ?></p>
                        <p><strong>Comment:</strong> <?php echo $row['comments']; ?></p>
                        <p><strong>Date:</strong> <?php echo $row['datetime']; ?></p>

                        <?php
                        // Display delete button and edit button for the user who added the review
                        ?>
                        <a class="delete-btn" href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>

                        <a class="edit-btn" href="editreview.php?id=<?php echo $row['id']; ?>">Edit</a>
                    </div>
                    <?php
                }
            }
        } else {
            echo "<p>No reviews yet.</p>";
        }
        ?>
        <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            window.location.href = 'myreviewdetails.php?delete=' + id;
        }
    }
</script>
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

   
<?php
}
?>
 </body>

</html>