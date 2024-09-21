<?php
include ('includes/connect.php');
include_once ('functions/common_function.php');
@session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Login</title>
    <link rel="stylesheet" href="css/stylep.css">
    <link rel="stylesheet" href="css/style_log.css">
</head>
<body>  
<link rel="stylesheet" href="css/style_log.css">
    <div class="login-container">
        <h2> User Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                
            </div>
            <button type="submit" class="btn-login" name="login">Login</button>
            <div>You have an Account? <a href="Registration.php">Register</a></div>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $Password=$_POST['password'];
    $select_query="SELECT * FROM `user_table` WHERE user_name='$username' AND user_password='$Password'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);  
    $row_data=mysqli_fetch_assoc($result); 
    $user_ip=getIPAddress();




    // Cart items
    $select_query_cart="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart); 
    if($row_count>0){
        $_SESSION['username']=$username;
        // echo "<script>alert('Login Successful')</script>";
        if($row_count==1 and $row_count_cart==0){
            $_SESSION['username']=$username;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }else{
            $_SESSION['username']=$username;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        // if(password_verify($Password,$row_data['user_password'])){
        //     echo "<script>alert('Login Successful')</script>";
            
        // }else{
        //     echo "<script>alert('Invalid data')</script>";
        // }
    }else{
        echo "<script>alert('Invalid data')</script>";
    }
    
}


?>