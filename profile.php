<?php
require('nav.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

</head>

<body>
    <!-- products -->
<div class="row">
    <div class="col-md-2 p-0">
<ul class="navbar-nav bg-light px-3 text-center" style="height:100vh">
    <li class="nav-item bg-success" ><a class="nav-link " href="#"><h4>Your Profile</h4></a></li>
    <li class="nav-item" ><a class="nav-link" href="profile.php"><h5>Pending Orders</h5></a></li>
    <li class="nav-item" ><a class="nav-link" href="profile.php?edit_account"><h5>Edit Account</h5></a></li>
    <li class="nav-item" ><a class="nav-link" href="profile.php?myorders"><h5>My Orders</h5></a></li>
    <li class="nav-item" ><a class="nav-link" href="profile.php?delete_acc"><h5>Delete Account</h5></a></li>
    <li class="nav-item" ><a class="nav-link" href="logout.php"><h5>Logout</h5></a></li>
</ul>
    
</div>
<div class="col md-10 text-center">
    <?php
    get_user_order_details();
    
    if(isset($_GET['edit_account'])){
        include('edit_account.php');

    }
    if(isset($_GET['myorders'])){
        include('myorders.php');

    }
    if(isset($_GET['delete_acc'])){
        include('delete_acc.php');

    }
    ?>
    </div>

    <!-- Product section End-->

    <!--Footer Section Start-->
    <footer>
        <div class="container">
            <div class="sec aboutus">
                <h2>About us</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto quasi odio quo architecto est
                    eligendi unde ea neque quos voluptas, obcaecati doloremque, voluptatum eius molestiae impedit?
                    Blanditiis, sunt. Error, sint!</p>
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




    <!--Footer Section End-->


    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>