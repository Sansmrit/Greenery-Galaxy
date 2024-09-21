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
    <title>Payment Options</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .payment-options {
            display: flex;
            justify-content: space-around;
            
        }
        .option {
            background-color: #28A754;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .option:hover {
            background-color: #147536;
        }
    </style>
</head>
<body>
    <?php
   
    $user_ip=getIPAddress();
    $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
    <div class="container">
        <h1>Select Payment Method</h1>
        <div class="payment-options">
            <a href="" class="option"><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_OyW7O1w6c29GCK" async> </script> </form>Online Payment</a>
            <a href="order.php?user_id=<?php echo $user_id ?>" class="option">Offline Payment</a>
        </div>
    </div>
</body>
</html>