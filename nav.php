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