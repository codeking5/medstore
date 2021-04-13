<?php
session_start();
if(isset($_SESSION['admin_id'])) {
header('location:all/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="login_assets/css/login.css">
  </head>
  <body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="login_assets/images/3.jpg" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <div class="brand-wrapper">
                  <img src="login_assets/images/logo.svg" alt="MEDSTORE" class="logo">
                </div>
                <p class="login-card-description">Sign into your account</p>
                <form action="index.php" method="post">
                  <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input name="signin" id="signin" class="btn btn-block login-btn mb-4" type="submit" value="signin">
                </form>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="card login-card">
          <img src="login_assets/images/login.jpg" alt="login" class="login-card-img">
          <div class="card-body">
            <h2 class="login-card-title">Login</h2>
            <p class="login-card-description">Sign in to your account to continue.</p>
            <form action="#!">
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-prompt-wrapper">
                <div class="custom-control custom-checkbox login-card-check-box">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>
                <a href="#!" class="text-reset">Forgot password?</a>
              </div>
              <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
            </form>
            <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
          </div>
        </div> -->
      </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
include ('db.php');
if(isset($_POST['signin'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$select_qry = "SELECT * FROM admin WHERE username ='$username' AND password ='$password'";
$select_qry_run = mysqli_query($con, $select_qry);
if($select_qry_run) {
?>
<script type="text/javascript">
alert ('Sorry! Invalid Credential :(');
window.open('index.php','_self');
</script>
<?php
} else {
$id = rand(1,99999);
$_SESSION['admin_id'] = $id ;
header('location:all/dashboard.php');
}
}
?>