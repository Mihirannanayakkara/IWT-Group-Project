<?php
require '../admin/config.php';


if (isset($_GET['id'])) {
  $paymentId = $_GET['id'];

  // Delete the row from the table
  $query = "DELETE FROM payment WHERE p_id='$paymentId'";

  if (mysqli_query($conn, $query)) {
      echo "<script>alert('Record Deleted Successfully');
      window.location.replace('paymentsummary.php');</script>";
  } else {
      echo "<script>alert('Error In Delete: " . mysqli_error($conn) . "');</script>";
  }
}
// Read operation
$sql = "SELECT * FROM payment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2 style='color:white;'>Payment ID: " . $row["p_id"] . "<br>";
        echo "Payment Type: " . $row["p_type"] . "<br>";
        echo "Card Holder Name: " . $row["c_name"] . "<br>";
        echo "Card Number: " . $row["c_number"] . "<br>";
        echo "CVV Number: " . $row["cvv_number"] . "<br><br></h2>";
        echo "<a href='javascript:void(0);' onclick='confirmDelete(" . $row['p_id'] . ")' class='remove-button'>Remove</a>";
    }
} else {
    echo "No payments found.";
}

?>

<html>
<head>
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="stylesheet" href="cartstyle.css">
    <link rel="stylesheet" href="detailstyle.css">
    <link rel="stylesheet" type="text/css" href="styles/sakilastyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>


<script>
    function confirmDelete(p_id) {
        if (confirm('Are you sure you want to delete this record?')) {
            window.location.href = 'volat.php?id=' + p_id;
        }
    }
</script>

<footer>
    <div class="footer-content">
        <div class="footer-section">
            <img src="../admin/image1.png" alt="" width="100px" height="100px">
            <p>Our mission is to empower creators worldwide to tell their stories through video.</p>
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
                <li><a href="../payment/aboutus.html">About Us</a></li>
                <li><a href="../Contactus.html">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <div class="icon">
        <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
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
