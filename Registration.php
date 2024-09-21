<?php
include ('includes/connect.php');
include_once ('functions/common_function.php');


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="css/Reg_style.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="#" method="post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Enter Full Name"/>
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">Phone Number</label>
            <input type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Enter Phone Number"/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"/>
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Enter Username"/>
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password"/>
          </div>
          <!-- <div class="user-input-box">
            <label for="user-image">Image</label>
            <input type="file" id="user_image" name="user_image"/>
          </div> -->
          <!-- <div class="address">
            
            <input type="text" placeholder="Address">
          </div> -->
        </div>
        <div class="user-input-box">
            <label for="address">Address</label>
            <input type="text"
                    id="address"
                    name="address"
                    placeholder="Enter address"/>
          </div>
        <div class="gender-details-box">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other">
            <label for="other">Other</label>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register" name="user_registration">
        </div><br>
        <div><center> You are already Registered ?<a href="User_login.php">Login</a></center></div>
        
      </form>
    </div>
  </body>
</html>


<?php
if(isset($_POST['user_registration'])){
  // $fullname=$_POST['fullName'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $phonenum=$_POST['phoneNumber'];
  $Password=$_POST['password'];
  $conf_Password=$_POST['confirmPassword'];
  $Address=$_POST['address'];
  $user_ip=getIPAddress();

//select query
$select_query = "SELECT * FROM `user_table` WHERE `user_name`='$username' OR `user_email`='$email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Username  or Email alredy exist')</script>";
}elseif($Password!=$conf_Password){
  echo "<script>alert('password do not match.')</script>";
}
else{
// insert query
$insert_query="INSERT INTO `user_table` (user_name,user_email,user_password,user_ip,user_address,user_mobile) VALUES('$username','$email','$Password','$user_ip','$Address',' $phonenum')";
$sql_execute=mysqli_query($con,$insert_query);
if($sql_execute){
  echo "<script>alert('Data is inserted successfuly')</script>";
}else{
  die(mysqli_error($con));
}

}

//Selecting cart items
$select_cart_items="SELECT * FROM `cart_details` WHERE `ip_address`='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$row_cart=mysqli_num_rows($result_cart);
if($row_cart>0){
  $_SESSION['username']=$username;
  echo "<script>alert('You have item in the cart')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
}else{
  echo "<script>window.open('index.php','_self')</script>";
}


}


?>