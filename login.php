
<?php
require_once('config/config.php');
if(isset($_POST['goto'])){
    //
    $email = $_POST['email'];
    $password = $_POST['password'];
    //
    $query = "SELECT `CustomerId`, `Fullname`, `EmailAddress`, `Password`, `PhoneNumber`, `Status` FROM `customer` WHERE `EmailAddress`='$email' AND `Password`='$password'";
    $res = mysqli_query(connection(), $query);
    $data = $res->fetch_assoc();
    // print_r($data);
    // echo 12345678;
    if(is_array($data) && !empty($data['EmailAddress'])){
      $_SESSION['islogged_in'] = $data['EmailAddress'];
      $_SESSION['user_data'] = $data;
        header("Location: index.php");
    }else{
      print 'invalid username or password';
    }
   //print_r($data);
    //
}
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
  ?> 
  <!-- Header -->
  <!-- Page Content -->
  <div class="container">
<!-- tickets info  -->
    <div class="row" style="min-height:500px;">
      <div class="col-md-12 mb-5">
        <form method="post">
            <h2>Login to Juncky Cinema</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Email Address</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" placeholder="email address" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <button type="submit" name="goto" class="btn btn-primary btn-block">Login</button>
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
