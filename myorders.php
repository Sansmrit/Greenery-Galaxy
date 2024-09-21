<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myorders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-custom {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .table-custom thead th {
            background-color: #4CAF50;
            color: white;
            text-align: left;
            padding: 12px;
        }
        .table-custom tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table-custom tbody tr:hover {
            background-color: #ddd;
        }
        .table-custom td {
            padding: 12px;
            text-align: left;
        }
        .status-complete {
            color: #28a745; /* Green */
            font-weight: bold;
        }
        .status-incomplete {
            color: #dc3545; /* Red */
            font-weight: bold;
        }
        .confirm-btn {
            color: #007bff; /* Blue */
            text-decoration: none;
            font-weight: bold;
        }
        .confirm-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<?php
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE user_name='$username'";
    $result = mysqli_query($con, $get_user);
    $row_featch = mysqli_fetch_assoc($result);
    $user_id = $row_featch['user_id'];
?>
<body>
    <div class="container">
        <h3 class="text-success mt-4">All My Orders</h3>
        <table class="table table-custom mt-5">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Complete/Incomplete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_order_details = "SELECT * FROM `user_orders` WHERE user_id=$user_id";
                $result_orders = mysqli_query($con, $get_order_details);
                $number=1;
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_orders['order_id'];
                    $amount_due = $row_orders['amount_due'];
                    $total_products = $row_orders['total_products'];
                    $invoice_number = $row_orders['invoice_number'];
                    $order_date = $row_orders['order_date'];      
                    $order_status = $row_orders['order_status'];
                    if ($order_status == 'pending') {
                        $order_status_display = 'Incomplete';
                        $status_class = 'status-incomplete';
                    } else {
                        $order_status_display = 'Complete';
                        $status_class = 'status-complete';
                    }

                    echo " 
                    <tr>
                        <td>$number</td>
                        <td>Rs.$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td class='$status_class'>$order_status_display</td>";
                        ?>
                        <?php
                        if($order_status_display=='Complete'){
                            echo "<td>Paid</td>";
                        }else{
                        echo "<td><a class='confirm-btn' href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
                    </tr>";
                        }
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


    
</body>

</html>