<?php

session_start();
if (isset($_SESSION['login-failed']) == 'fail') {
    echo "<script type='text/javascript'>alert('Invalid Username and Password');</script>";
}
if (isset($_SESSION['register-status']) && $_SESSION['register-status'] == 'success') {
    echo "<script type='text/javascript'>alert('Register success please login');</script>";
    unset($_SESSION['register-status']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>LOGIN</title>
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body class="bg-success">
  <div class="container justify-content-center">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col xs-12">
        <form class="form-container bg-light" method="POST" action="login-check.php">
          <h4 class="text-center">Login</h4>
          <div class="form-group">
            <label for="username">Username : </label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" />
          </div>
          <div class="form-group">
            <label for="password">Password : </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
          </div>
          <div class="container">
            <button type="submit" class="btn btn-success btn-lg">
              Login
            </button>
            <a href="../register/index.php">
              <button type="button" class="btn btn-success btn-lg">
                Register
              </button>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>