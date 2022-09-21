<?php
  $isLogout = $_GET["logout"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

  <title>Employee Management Project</title>

</head>

<body>
  <div class="logo">
    <a class="navbar-brand" href="#">
      <img src="https://i2.wp.com/assemblerschool.com/wp-content/uploads/2020/11/LOGO-ORG.png?fit=479%2C131" alt="logo"
        height="50">
    </a>
  </div>
  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class=" card">
        <div class="title">
          <h2>Student <br />Management <br /> Dashboard</h2>
          <!-- <div class="d-flex justify-content-end social_icon">
            <span><i class="fab fa-facebook-square"></i></span>
            <span><i class="fab fa-google-plus-square"></i></span>
            <span><i class="fab fa-twitter-square"></i></span>
          </div> -->
        </div>
        <div class="card-body">
          <form method="POST" id="login">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="username" name="username" id="username">

            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="password" name="password" id="password">
            </div>

            <?= $isLogout ?  '<div class="alert alert-info" id="logoutLabel" role="alert">You have succesfully logged out!</div>':"" ?>

            <div class="alert alert-danger d-none" role="alert" id="error"></div>

            <div class="row align-items-center remember">
              <input type="checkbox">Remember Me
            </div>
            <div class="form-group">
              <input type="submit" value="Login" class="btn float-right login_btn">
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="d-flex justify-content-center links">
            Don't have an account?<a href="#">Sign Up</a>
          </div>
          <div class="d-flex justify-content-center">
            <a href="#">Forgot your password?</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="./assets/js/index.js"></script>

</body>

</html>