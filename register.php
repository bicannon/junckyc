
<?php
require_once('config/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=SYSTEM_NAME?> | Create Account</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">
<style>
.pb-5, .py-5 {
    padding-bottom: 1rem!important;
}

.pt-5, .py-5 {
    padding-top: 1rem!important;
}
.mb-5, .my-5 {
    margin-bottom: 1rem!important;
}
</style>
</head>

<body>
  <?php
  require_once('config/nav.php');
  if(isset($_POST['goto'])){
      //
      $fname = $_POST['firstName'];
      $lname = $_POST['lastName'];
      $full_name = $fname. ' ' . $lname;
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      $phone = $_POST['phoneNumber'];
      //
      $query = "INSERT INTO `customer`(`Username`, `EmailAddress`, `Password`, `PhoneNumber`, `Status`) VALUES ('$full_name','$email','$password','$phone','1')";
      mysqli_query(connection(), $query);
      print 'Acount Created';
      //
  }
  ?> 
  <!-- Header -->
  <!-- Page Content -->
  <div class="container">
<!-- tickets info  -->
    <div class="row" style="min-height:500px;">
      <div class="col-md-12 mb-5">
        <form method="post">
            <h2>Registration</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="firstName" placeholder="First Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="lastName" placeholder="Last Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email" name="email" placeholder="Email" class="form-control" name= "email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                        <input type="password" name="cpassword" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                    <div class="col-sm-9">
                        <input type="phoneNumber" name="phoneNumber" placeholder="Phone number" class="form-control">
                    </div>
                </div>
                <button type="submit" name="goto" class="btn btn-primary btn-block">Register</button>
        </form>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
<?php
require_once('config/footer.php');
?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
