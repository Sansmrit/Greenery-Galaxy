<!--connection-->
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
    <title>GreeneryGalaxy</title>



    <!-- bootstrap  css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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

                <a href="#contact">Contact Us</a>
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

    <!--Header Section Start-->
    <div class="main" id="home">
        <div class="home-banner">
            <div class="wraper">
                <div class="slide">
                    <div class="box" style="background: url(images/slider1.jpg);">
                    <!-- <div class="box" style="background: url(images/banner.png);"> -->
                        <span>upto 45% off</span>
                        <h3>plant big sale special offers</h3>
                        <!-- <a href="#" class="btn">Shop Now</a> -->
                    </div>
                </div>
            </div>
        </div>
</div><br>
    <div>
        <div class="product">
            
                <!-- products -->
                <div class="">

                    <!-- Featching products-->
                    <?php
                    getproducts();
                    ?>

                    <!-- row end -->

            
    
        </div>
    </div>
    
    <!--Header Section End-->
    <!--Banner section start-->
    <!-- 
    <h1 style="text-align:center"> Shop By Categories</h1>
    <section class="banner-container">
        <div class="banner">
            <img src="images/slider1.jpg" alt="">
            <div class="content">
                <span>Apart from adding to the beauty of your home décor, indoor plants are beneficial in boosting your overall wellness and improving the overall air quality. </span>
                <h3>Indoor plants</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>

        </div>
        <div class="banner">
            <img src="images/outdoor.jpg" alt="">
            <div class="content">
                <span>Outdoor plants give us oxygen and absorb carbon dioxide during the photosynthesis process, but also reduce stress, anxiety, and tiredness and give us relaxation.</span>
                <h3>Outdoor plants </h3>
                <a href="#" class="btn">Shop Now</a>
            </div>

        </div>
        <div class="banner">
            <img src="images/fruit.jpg" alt="">
            <div class="content">
                <span>Fruit is the fleshy or dry ripened ovary of a flowering plant, enclosing the seed or seeds. </span>
                <h3>Fruit plants </h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
        </div>

    </section>
    <section class="banner-container">
        <div class="banner">
            <img src="images/Flower.jpg" alt="">
            <div class="content">
                <span>Flowering plants are plants that bear flowers and fruits, and form the clade Angiospermae, commonly called angiosperms. </span>
                <h3>Flower Plants</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>

        </div>
        <div class="banner">
            <img src="images/peperomia plant.jpg" alt="">
            <div class="content">
                <span>Climbers and wall shrubs are a brilliant way to liven up dull walls, fences, obelisks and supports throughout the garden, especially when planting space is limited. </span>
                <h3>Climbers</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>

        </div>
        <<div class="banner">
            <img src="images/slider3.avif" alt="">
            <div class="content">
                <span>Herbs are short-sized plants with soft, green, delicate stems without woody tissues. They complete their life cycle within one or two seasons.</span>
                <h3>Herbs</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
        </div>

    </section>
    <h1 style="text-align:center"> Our Top Products</h1>
    <section class="banner-container">
        <div class="banner">
            <img src="images/Orchid.jfif" alt="">
            <div class="content">
                <span>Distinguished by its mystifying charm and deep velvety hue, the Black Orchid emanates an air of elegance and fascination, rendering it an eminent choice for exceptional occasions.</span>
                <h3>Black Orchid</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>

        </div>
        <div class="banner">
            <img src="images/Saffron.jpg" alt="">
            <div class="content">
                <span>The fragile saffron crocus harbours the world's most prized spice, saffron. Its vibrant orange stigmas are meticulously hand-harvested, culminating in a labour-intensive epitome of opulence.</span>
                <h3>Saffron Crocus.</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>

        </div>
        <div class="banner">
            <img src="images/Gold Of Kinabalu Orchid.jpg" alt="">
            <div class="content">
                <span>Indigenous to Mount Kinabalu in Borneo, this orchid's scarcity and unique colour scheme have elevated it to a prestigious position among the most sought-after and costly blossoms.</span>
                <h3>Gold of Kinabalu Orchid.</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
        </div>

    </section>
    <section class="banner-container">
        <div class="banner">
            <img src="images/Kadupul Flower.jpg" alt="">
            <div class="content">
                <span>Heralded as the "Queen of the Night," the Kadupul flower is renowned for its ethereal loveliness and elusive fragrance, which only awakens after dusk, further enhancing its exclusivity.</span>
                <h3>Kadupul Flower.</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>

        </div>
        <div class="banner">
            <img src="images/Blue Himalayan Poppy.jpg" alt="">
            <div class="content">
                <span>Adorning alpine meadows with its arresting azure hue, the Blue Himalayan Poppy is a rare spectacle. Its rarity bestows upon it considerable worth in the realm of ornamental flowers.</span>
                <h3>Blue Himalayan Poppy.</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>

        </div>
        <div class="banner">
            <img src="images/Gloriosa Lily.jfif" alt="">
            <div class="content">
                <span>With its fiery red and yellow petals, the Gloriosa Lily has earned the epithet "Flame Lily." Its exotic visage and limited cultivation add to its esteemed status.</span>
                <h3>Gloriosa Lily</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
        </div>

    </section> -->

    <!--Banner section end-->





    <!--Contact Us section start-->
    <section class="contact" id="contact">
        <h1 class="heading">Contact Us</h1>
        <div class="row">
            <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30512.917765468195!2d73.62882619999998!3d17.067040300000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc1e663f4ef40e5%3A0xe9d7c795d2aa17ac!2sDevrukh%2C%20Maharashtra%20415804!5e0!3m2!1sen!2sin!4v1720786074036!5m2!1sen!2sin"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <form action="">
                <div class="inputBox">
                    <input type="text" required>
                    <label>name</label>
                </div>
                <div class="inputBox">
                    <input type="email" required>
                    <label>email</label>
                </div>
                <div class="inputBox">
                    <input type="number" required>
                    <label>number</label>
                </div>
                <div class="inputBox">
                    <textarea required name="" id="" cols="30" rows="10"></textarea>
                    <label>message</label>
                </div>
                <input type="submit" value="send message" class="btn">
            </form>
        </div>
    </section>


    <!--Contact Us section end-->




    <!--Footer section start-->

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










    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--custom js file link-->
    <script src="js/script.js"></script>
</body>

</html>