<?php
// Ensure session is started

if (isset($_GET['edit_account'])) {
    // Check if the session variable is set
    if (isset($_SESSION['username'])) {
        $user_session_name = $_SESSION['username'];

        // Execute the SQL query
        $select_query = "SELECT * FROM `user_table` WHERE user_name='$user_session_name'";
        $result_query = mysqli_query($con, $select_query);

        // Check if the query was successful
        if ($result_query) {
            $row_featch = mysqli_fetch_assoc($result_query);

            // Check if a user was found
            if ($row_featch) {
                // Access user data
                $user_id = $row_featch['user_id'];
                $user_name = $row_featch['user_name'];
                $email = $row_featch['user_email'];
                $user_address = $row_featch['user_address'];
                $user_mobile = $row_featch['user_mobile'];
            } else {
                // Handle case when no user is found
                echo "No user found with the username: $user_session_name.";
            }
        } else {
            // Handle query execution error
            echo "Error executing query: " . mysqli_error($con);
        }
    } else {
        echo "User is not logged in.";
    }
}

if (isset($_POST['user_update'])) {
    // Make sure $user_id is set and valid
    if (isset($user_id)) {
        // Sanitize input values to prevent SQL injection
        $user_name = $_POST['user_username'];
        $email = $_POST['user_email2'];
        $user_address = $_POST['user_address2'];
        $user_mobile = $_POST['user_mobile2'];

        // Debug: Print values to ensure they are correct
        // echo "Updating User ID: $user_id, Name: $user_name, Email: $email, Address: $user_address, Mobile: $user_mobile<br>";

        // Prepare the SQL statement
        $update_data = "UPDATE `user_table` SET user_name='$user_name', user_email='$email', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$user_id";
        
        // Prepare and bind
        $stmt = $con->prepare($update_data);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Data updated successfully');</script>";
            echo "<script>window.open('logout.php','_self');</script>";

        } else {
            echo "<script>alert('Error updating data: " . $stmt->error . "');</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "User ID is not set.";
    }
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit account</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5; /* Light background color */
        }
        .custom-form {
            max-width: 500px; /* Max width of the form */
            margin: 50px auto; /* Center the form */
            padding: 20px; /* Padding inside the form */
            background-color: white; /* Form background color */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow */
        }
    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4" >Edit Account</h3>
    <div class="custom-form">
    <form action="" method="post">
        <div class="form-group">
            <label for="user_username">Username</label>
            <input type="text" class="form-control" id="user_username" value="<?php echo $user_name ?>" name="user_username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" class="form-control" id="user_email" value="<?php echo $email ?>" name="user_email2" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="user_address">Address</label>
            <input type="text" class="form-control" id="user_address" value="<?php echo $user_address ?>" name="user_address2" placeholder="Enter your address" required>
        </div>
        <div class="form-group">
            <label for="user_mobile">Mobile</label>
            <input type="text" class="form-control" id="user_mobile" value="<?php echo  $user_mobile ?>" name="user_mobile2" placeholder="Enter your mobile number" required>
        </div>
        <button type="submit" class="btn btn-success btn-block" name="user_update">Update</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>