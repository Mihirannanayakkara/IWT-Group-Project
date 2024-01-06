<?php
require '../admin/config.php';

if (isset($_GET['id'])) {
    $movieID = $_GET['id'];

    // Retrieve the movie details from the database
    $sql = "SELECT * FROM movie WHERE MovieID = $movieID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row['Picture'];
        $name = $row['Name'];
        $price = $row['Price'];
        $description = $row['Description'];
    } else {
        echo "Movie not found.";
    }
    
        $musicID = $_GET['id'];
    
        // Retrieve the movie details from the database
        $sql = "SELECT * FROM music WHERE MusicID = $musicID";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $image = $row['Picture'];
            $name = $row['Name'];
            $price = $row['Price'];
            $description = $row['Description'];
        } else {
            echo "Movie not found.";
        }

    // Create or update the cart item in the database
    $conn = new mysqli("localhost", "root", "", "666station");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the item already exists in the cart
    $sql = "SELECT * FROM cart WHERE product_name = '$name' AND price = '$price' AND picture = '$image'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Item already exists in the cart.";
    } else {
        $sql = "INSERT INTO cart (product_name, price, picture) VALUES ('$name', '$price', '$image')";
        $conn->query($sql);
    }
}

if (isset($_GET['remove'])) {
    $removeID = $_GET['remove'];

    // Remove the item from the cart table
    $sql = "DELETE FROM cart WHERE product_id = $removeID";
    $conn->query($sql);
}

?>

<!DOCTYPE html>
< lang="en">

<head>
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="stylesheet" href="cartstyle.css">
    <link rel="stylesheet" href="detailstyle.css">
    <link rel="stylesheet" type="text/css" href="styles/sakilastyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="JS/script.js"></script>
    <title>Shopping Cart</title>
</head>

<>
    <div class="topnav">
        <a href="index.php"><img src="../admin/images/logo.jpeg" style="width: 130px;min-height: 60px;"></a>
        <a href="../src/index.php">Home</a>
        <a href="../src/music.php">Music</a>
        <a href="../src/movie.php">Movie</a>
        <a href="../src/myreviewdetails.php" readonly>Feedback</a>
        <a href="../admin/contactus.html">Contact us</a>
        <a href="../project/userAcc.php"><i class='fa fa-user-circle' style="font-size:30px ;"></i></a>
        <a href="#"><i class="fa fa-shopping-cart, color:white;" style="font-size:30px"></i></a>
    </div>

    <!--cart item details-->
    <div class="small-container">
        <table style="width:70%;">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <?php
                                echo "<img src='../admin/img/" . $row['picture'] . "'class='movie-image' >";
                                ?>
                                <div>
                                    <?php
                                    echo "<p>" . $row['product_name'] . "</p>";
                                    ?>
                                    <td><input type="number" value="1"></td>
                                    <td><?php echo "<small> $ " . $row['price'] . "</small>"; ?></td>
                                    <td>
                                        <?php
                                        echo "<a href='javascript:void(0);' onclick='confirmDelete(" . $row['product_id'] . ")' class='remove-button'>Remove</a>";
                                        ?>
                                    </td>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php }}?>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <?php
                    $sql = "SELECT sum(price) as total FROM cart ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <td>Subtotal</td>
                            <td>$<?php echo $row['total']; ?></td>
                </tr>

                <tr>
                    <td>Total</td>
                    <td>$<?php echo $row['total']; ?></td>
                </tr>
            <?php }}?>
            </table>
        </div>

        <button onclick="window.location.href='../payment/terms.html'" id="button">Checkout</button>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to remove this item from the cart?")) {
                window.location.href = "?remove=" + id;
            }
        }
    </script>
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
    
  

    </footer>
     

</body>

</html>