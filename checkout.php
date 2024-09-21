<?php
include ('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="css/stylep.css">
     <!-- font awesome cdn link-->
     <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    

    <!-- bootstrap  css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .cart_img{
        width: 80px;
        height: 80px;
        object-fit: contain;
    }
</style>
</head>


<body>
<header>
<div class="header-2">
            <a href="#" class="logo"><img src="images/lg.png" height="80px" width="80px"></a>
           
        </div>
        <div class="header-3">
            <div id="menu-bar" class="fas fa-bars"></div>
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="product.php">Products</a>
                <div class="dropdown">
                    <a class="category">Categories</a>
                    <div class="dropdown-content">
                    <?php
// Assuming $con is your database connection object

// Query to select all categories
$select_Categories = "SELECT * FROM `categories`";
$result_Categories = mysqli_query($con, $select_Categories);

// Check if there are any categories
if (mysqli_num_rows($result_Categories) > 0) {
    // Loop through each row of categories
    while ($row_data = mysqli_fetch_assoc($result_Categories)) {
        $category_id = $row_data['category_id'];
        $category_title = $row_data['category_title'];
        
        // Display each category as a list item with a link
        // echo "<li><a href='category.php?id=$category_id'>$category_title</a></li>";
        echo "<li><a href='$category_title.php'>$category_title</a></li>";
    }
} else {
    // Handle case where no categories are found
    echo "No categories found.";
}

// Free result set
mysqli_free_result($result_Categories);

// Close connection
mysqli_close($con);
?>

                    </div>
                    
                </div>
                
                <a href="#Contact Us">Contact Us</a>
                <a href="#About Us">About Us</a>
            </nav>
            <?php
                 if(!isset($_SESSION['username'])){
                    // echo "<a class='nav-link' href='User_login.php'>Login</a>";
                    echo "<a  href='User_login.php'>
    <i class='fas fa-user-circle' aria-hidden='true'></i></a>";
                }
                else{
                    // echo "<a class='nav-link' href='logout.php'>Logout</a>";
                    echo "<a  href='logout.php'>
    <i class='fa-solid fa-right-from-bracket' aria-hidden='true'></i></a>";
                }
                 ?>
            <!-- <div class="icons">
                
                <a href="#" class="fas fa-user-circle"></a>
            </div> -->
        </div>
</header><br>
<!-- Products -->
 <div class="row px-1">
    <div class="col-md-12">
        <div class="row">
            <?php
            if(!isset($_SESSION['username'])){
                echo "<script>window.open('User_login.php','_self')</script>";
               

            }else{
                // include('payment.php','_self');
                echo "<script>window.open('payment.php','_self')</script>";
            }
            ?><br>
        </div>
    </div>
 </div>


   <!--Footer Section Start-->
  <footer>
    <div class="container">
        <div class="sec aboutus">
            <h2>About us</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto quasi odio quo architecto est eligendi unde ea neque quos voluptas, obcaecati doloremque, voluptatum eius molestiae impedit? Blanditiis, sunt. Error, sint!</p>
            <ul class="sci">
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>  
            </ul>
        </div>
        <div class="sec quicklinks">
            <h2>Support</h2>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="sec quicklinks">
            <h2>shop</h2>
            <ul>
                <li><a href="#">Products</a></li>
                <li><a href="#">Fruit Plants</a></li>
                <li><a href="#">Flower Plants</a></li>
                <li><a href="#">Decorative Plants</a></li>
            </ul>
        </div>
        <div class="sec contact">
            <h2>Contact Us</h2>
            <ul class="info"></ul>
            <li>
                <span><i class="fa-solid fa-phone"></i></span><p><a href="tel:9689163612" >9689163612</a></p>
            </li>
            <li>
                <span><i class="fa-solid fa-envelope"></i></span><p><a href="mailto:greenerygalaxy45@emailto.meee">greenerygalaxy45@emailto.meee</a></p>
            </li>
        </div>

    </div>
    </footer>
    <div class="copyrightText">
        <p>Copyright 2024 online plants selling platform.All rights reserved.</p>
    </div>




<!--Footer Section End-->


<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>