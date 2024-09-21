<?php
include ('includes/connect.php');
include_once ('functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoor Plants</title>



    <!-- bootstrap  css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .about-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .about-text, .about-image {
            flex: 1;
            min-width: 300px;
        }
        .about-text {
            padding: 20px;
        }
        .about-image img {
            width: 100%;
            border-radius: 10px;
        }
        .mission {
            margin-top: 40px;
            text-align: center;
        }
        .mission h2 {
            color: #4CAF50;
        }
        .team {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 40px;
        }
        .team-member {
            flex: 1 1 300px;
            text-align: center;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .team-member img {
            width: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        footer {
            background-color: #ffff;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .social-icons {
            margin-top: 10px;
        }
        .social-icons a {
            color: white;
            padding-left: 40px;
            margin: 0 30px;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>
<body> 
        <div class="header-3">
        <a href="#" class="logo"><img src="images/lg.png" height="80px" width="80px"></a>

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

               
                <a href="about_us.php">About Us</a>
                <form action="search_product.php" method="GET">
                <div class="d-flex m-4 gap-2">
                <input type="text" id="search-bar" name="search_data" placeholder="Search..."
                    aria-label="Search products" class="form-control p-2" required>
                <button type="submit" name="search_data_product" class="p-1 btn-outline-light bg-success rounded text-light">Search</button>
                
                </div>
                </form>
            </nav>
            <!-- Calling cart Function -->
            <?php
            cart();
            ?>


            <div class="d-flex icons">
                <a href="cart.php"><i class="position-relative fa-solid fa-cart-shopping"></i></a>
                <div class="cart-item">
                <sup class="p-2 rounded-pill bg-primary text-light" > <?php cart_item(); ?></sup>
                </div>
                <!-- <a href="#" class="fas fa-heart"></a> -->
                <!-- <a href="User_login.php" class="fas fa-user-circle"></a> -->
                <!-- <a href="#" class="fas fa-user-circle">Total Price:<?php total_cart_price(); ?></a> -->
                <?php
                if(isset($_SESSION['username'])){
                    echo "<a  href='profile.php'>
    <i class='fas fa-user-circle' aria-hidden='true'></i></a>";
                }
                ?>
                <?php
                if (!isset($_SESSION['username'])) {
                    // echo "<a class='nav-link' href='User_login.php'>Login</a>";
                    echo "<a  href='User_login.php'>
    <i class='fas fa-user-circle' aria-hidden='true'></i></a>";
                } else {
                    // echo "<a class='nav-link' href='logout.php'>Logout</a>";
                    echo "<a  href='logout.php'>
    <i class='fa-solid fa-right-from-bracket' aria-hidden='true'></i></a>";

                }
              
?>
             
            </div>
<div id="menu-bar" class="fas fa-bars"></div>

        </div>
    </header><br>
    <div class="container">
        <div class="about-section">
            <div class="about-text">
                <h2>Welcome to Greenery Galaxy</h2>
                <p>At Greenery Galaxy, we believe in bringing nature closer to you. Our mission is to provide high-quality plants and gardening accessories to help you create a green oasis, whether it's in your home, office, or garden.</p>
                <p>With years of experience and a passion for plants, our team is dedicated to offering a diverse range of plants, from succulents and houseplants to outdoor varieties and rare species. We are here to help you grow your Greenery Galaxy and make your space vibrant with life.</p>
            </div>
            <div class="about-image">
                <img src="images/aloe.jpeg" alt="Beautiful plants">
            </div>
        </div>

        <div class="mission">
            <h2>Our Mission</h2>
            <p>To inspire and educate plant lovers of all kinds, providing them with the best products and advice to nurture a greener world.</p>
        </div>

        <div class="team">
            <div class="team-member">
                <img src="path-to-member-image.jpg" alt="Team Member">
                <h3>Addy boi</h3>
                <p>Founder & CEO</p>
                <p>Jane has a lifelong passion for plants and a dedication to spreading green love everywhere.</p>
            </div>
            <div class="team-member">
                <img src="path-to-member-image.jpg" alt="Team Member">
                <h3>Sanket gurav</h3>
                <p>Head Gardener</p>
                <p>With over 20 years of experience, John ensures every plant is nurtured with care.</p>
            </div>
            <!-- Add more team members as needed -->
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="sec aboutus">
                <h2>About us</h2>
                <p>Welcome to GreeneryGalaxy, your ultimate destination for nurturing nature from the comfort of your home! Our online nursery is dedicated to providing a wide array of plants, gardening supplies, and expert advice to help you create and maintain your own green paradise.</p>
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
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="sec quicklinks">
                <h2>shop</h2>
                <ul>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="Fruit Plants.php">Fruit Plants</a></li>
                    <li><a href="Flower Plants.php">Flower Plants</a></li>
                    <li><a href="Indoor Plants.php">Indoor plants</a></li>
                </ul>
            </div>
            <div class="sec contact">
                <h2>Contact Us</h2>
                <ul class="info"></ul>
                <li>
                    <span><i class="fa-solid fa-phone"></i></span>
                    <p><a href="tel:9689163612">9689163612</a></p>
                </li>
                <li>
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <p><a href="mailto:greenerygalaxy45@emailto.meee">greenerygalaxy45@emailto.meee</a></p>
                </li>
            </div>

        </div>
    </footer>
    <div class="copyrightText">
        <p>Copyright 2024 online plants selling platform.All rights reserved.</p>
    </div>
    <!--Footer section End-->
</body>
</html>
