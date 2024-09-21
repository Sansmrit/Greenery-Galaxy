<?php
require('nav.php');
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
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
<!-- Products -->
 <div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <!-- <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody> -->
                <!-- Php code to display cart data -->
                 <?php
                global $con;
                 $con = new mysqli('localhost', 'root', '', 'plantdb');
             
                 // Check for connection errors
                 if ($con->connect_error) {
                     die("Connection failed: " . $con->connect_error);
                 }
             
                 $get_ip_add = getIPAddress();
                 $total = 0;
             
                 // Make sure to properly quote the IP address in the query
                 $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                 $result = mysqli_query($con, $cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0){
                    echo " <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";


                 if ($result) {
                     while ($row = mysqli_fetch_array($result)) {
                         $product_id = $row['product_id'];
                         $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                         $result_products = mysqli_query($con, $select_products);
             
                         if ($result_products) {
                             while ($row_product_price = mysqli_fetch_array($result_products)) {
                                 // Directly use the product price
                                 $product_price = $row_product_price['product_price'];
                                 $product_table= $row_product_price['product_price'];
                                 $product_title= $row_product_price['product_title'];
                                 $product_image1= $row_product_price['product_image1'];
                                 $total += $product_price; // Add to total
                                 $total_price=$total;
                 ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./Admin Section/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50 mx-5 my-5" ></td>
                    <?php
                    $get_ip_add=getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="UPDATE `cart_details` set quantity=$quantities WHERE ip_address='$get_ip_add'";
                        $result_products_quantity = mysqli_query($con,$update_cart);
                        $total_price=$total_price*$quantities;
                        $total=$total_price;
                    }

                    ?>
                    <td><?php echo $product_price."/-" ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">update</button> -->
                         <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">remove</button> -->
                        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php
                 }
                } else {
                    echo "Error fetching product details: " . mysqli_error($con);
                }
            }
        } else {
            echo "Error fetching cart details: " . mysqli_error($con);
        }
     }
     else{
     echo "<h2 class='text-center text-danger'>Cart is Empty<h2>";
     }
     ?>
            </tbody>
        </table>
        <!-- Subtotal -->
         <div class="d-flex">
        <?php
         $get_ip_add = getIPAddress();
                 // Make sure to properly quote the IP address in the query
                 $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                 $result = mysqli_query($con, $cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0){
                    echo "<h4 class='px-3'>Subtotal :<b>$total/-</b></h4>
            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='Continue_shopping'>
            <button class='bg-secondary px-3 py-2 border-0 text-bg-dark'><a href='checkout.php' class='text-light text-decoration-none'>CheckOut</button></a>";
                 }else{
                   echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='Continue_shopping'>";
                 }
                 if(isset($_POST['Continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                 }

            ?>
         </div>
    </div>
 </div>
 </form>

 <!-- Function to remove item -->
  <?php
  function remove_cart_item(){
    global $con;
     $con = new mysqli('localhost', 'root', '', 'plantdb');
             
    // Check for connection errors
    if ($con->connect_error) {
         die("Connection failed: " . $con->connect_error);
    }
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="DELETE FROM `cart_details` WHERE product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
  }
  echo $remove_item=remove_cart_item();
  ?>




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