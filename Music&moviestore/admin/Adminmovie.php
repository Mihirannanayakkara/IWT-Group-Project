<?php
require 'config.php';

// Define the number of records to display per page
$recordsPerPage = 3;

// Get the current page number from the query string
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for retrieving the records from the database
$offset = ($currentPage - 1) * $recordsPerPage;


$searchKeyword = "";

// Check if a search keyword is provided in the query string
if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];
}

// Modify the SQL query based on the search keyword
$sql = "SELECT * FROM movie";
if (!empty($searchKeyword)) {
    $sql .= " WHERE Name LIKE '%$searchKeyword%' or Category LIKE '%$searchKeyword%'";
}

// Append the pagination clauses to the SQL query
$sql .= " LIMIT $offset, $recordsPerPage";


$result = $conn->query($sql);
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

<div id="main-content" class="container allContent-section py-4">
    <div class="all">
        <center>
            <h2 class="cusmuscmov"><i class="fa fa-film" style="font-size:100px"></i> Movie</h2>
            <div class="sea">
            <form method="GET" action="Adminmovie.php" class="search">
            <input type="text" name="search" placeholder="Search Name or Category...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
</div>
            <a href="Movieform.php"><button class="addbtn" ><i class="fa fa-upload"></i></button></a><br><br>
            <table class="table ">
                <thead>
                    <tr>
                        
                        <th class="text-center">Movie Name</th>
                        <th class="text-center">Picture</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Remove</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            
                            <td>" . $row["Name"] . "</td>
                            <td><img src='img/" . $row["Picture"] . "'></td>
                            <td>" . $row["Category"] . "</td>
                            <td><i class='fa fa-usd'>" . $row["Price"] . "</i></td>
                            <td>" . $row["Description"] . "</td>
                            <td><a href='javascript:void(0);' onclick='confirmDelete(" . $row["MovieID"] . ");'><i class='fa fa-trash'></i></a></td>
                            <td><a href='Editmovie.php?id=" . $row["MovieID"] . "&'><i class='fa fa-edit'></i></a></td>
                        </tr>";
                    }
                }else {
                    echo "<tr><td colspan='5'>No records found.</td></tr>";
                }
                ?>
            </table>
            <div class="pagination">
                <?php
                
                $totalCountQuery = "SELECT COUNT(*) AS total FROM movie";
                $totalCountResult = $conn->query($totalCountQuery);
                $totalCount = $totalCountResult->fetch_assoc()['total'];

                
                $totalPages = ceil($totalCount / $recordsPerPage);

              
                for ($i = 1; $i <= $totalPages; $i++) {
                    $isActive = ($i == $currentPage) ? "active" : "";
                    echo "<a href='Adminmovie.php?page=$i' class='$isActive'>$i</a>";
                }
                ?>
            </div>
            <script>
                function confirmDelete(MovieID) {
                    if (confirm('Are you sure you want to delete this record?')) {
                        window.location.href = 'Deletemovie.php?id=' + MovieID;
                    }
                }
            </script>
        </div>
    </center>
</div>

<div class="sidebar" id="mySidebar">
    <div class="side-header">
        <img src="images/user.jpg" width="120" height="120" alt="Swiss Collection">
        <h5 style="margin-top:10px;">Hello, Admin</h5>
    </div>
    <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="#" class="closebtn" onclick="closeNav()"><i class="fa fa-close"></i></a>
    <a href="Admindash.php"><i class="fa fa-home"></i> Dashboard</a>
    <a href="Admindash.php" ><i class="fa fa-users"></i> Customers</a><br>
    <a href="#" ><i class="fa fa-th-large"></i> Category</a>
    <ul class="cate">
        <li><a href="Adminmusic.php"><i class="fa fa-music"></i> Music</a></li>
        <li><a href="Adminmovie.php"><i class="fa fa-film"></i> Movies</a></li>
    </ul>
</div>

<footer>
    <div class="footer-content">
        <div class="footer-section">
            <img src="image1.png" alt="" width="100px" height="100px">
            <p>Our mission is to empower creators worldwide to tell their stories through video.</p>
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
            <h3>Company</h3>
            <hr class="hr"><br>
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