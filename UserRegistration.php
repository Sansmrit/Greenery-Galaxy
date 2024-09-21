<?php
  include('dbConnection.php');

  if(isset($_REQUEST['rSignup'])){
    // Checking for Empty Fields
    if(empty($_REQUEST['rName']) || empty($_REQUEST['rEmail']) || empty($_REQUEST['rPassword'])){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    } else {
        // checking if email is already registered
        $rEmail = $_REQUEST['rEmail'];
        
        // Prepare a SELECT query to check if the email exists
        $stmt = $conn->prepare("SELECT * FROM user_tb WHERE u_email = ?");
        $stmt->bind_param("s", $rEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            // Email already exists in the database
            $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
        } else {
            // Email is not registered, proceed with registration
            $rName = $_REQUEST['rName'];
            $rPassword = $_REQUEST['rPassword'];

            // Prepare an INSERT query to add the new user
            $r_password = password_hash($rPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user_tb (u_name, u_email, u_password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $rName, $rEmail, $rPassword);

            if($stmt->execute()){
                $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Successfully Created </div>';
            } else {
                $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
            }
        }
    }
}

?>



<div class="container pt-5" id="registration">
    <h2 class="text-center">Create an Account</h2>
    <div class="raw mt-4 mv-4">
      <div class="col-md-6 offset-md-3">
        <form action="" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="rName">
          </div>

          <div class="form-group">
            <i class="fas fa-user"></i><label for="Email" class="font-weight-bold pl-2">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="rEmail">
          </div>

          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">New Password</label>
            <input type="Password" class="form-control" placeholder="Password" name="rPassword">
          </div>

          <button type="submit" class="btn btn-info mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
          <?php if(isset($regmsg)) {echo $regmsg;} ?>
        </form>
      </div>
    </div>
  </div>