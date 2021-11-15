<!-- expiring session feature -->
<?php
// require("../src/library/sessionHelper.php");

// Session starts
session_start();

if(isset($_SESSION)) {
    // Login time is stored in a session variable
    $_SESSION["login_time_stamp"] = time(); 
}
?>



<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management V1</title>
  <link type="text/css" rel="stylesheet" href="jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="jsgrid-theme.min.css" />
  <script type="text/javascript" src="jsgrid.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style> -->

  <!-- Custom styles for this template -->
<link href="./assets/css/login.css" rel="stylesheet">

</head>

<body class="text-center">

<main class="form-signin">
  <form class="" action="./src/library/loginController.php" method="POST">
  <img src="./assets/img/icon employees.png" width="100" height="100" class="me-3" alt="Dani&Marc">
      <h1 class="h3 mb-3 fw-normal text-left">Sign in to your account</h1>

    <div class="form-floating">
      
      <input required type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="name@example.org" data-bs-toggle="tooltip" data-bs-html="true">
      <label for="exampleInputEmail1" >Email address</label>
      
    </div>
    <div class="form-floating">
      <input required type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Contrasenya">
      <label for="exampleInputPassword1">Password</label>
    </div>
    
    <button type="submit" class="w-100 btn login-btn">Sign in</button>
    <?php 
      if(isset($_GET['invalidData'])){
          echo "<div class='alert alert-danger'> <h5>Invalid password or email, please try again. </h5></div>";
          unset($_GET['invalidData']);
        }
  
      if(isset($_GET['logOut'])) {
          echo "<div class='alert alert-success'> <h5>you have been successfully logged out.</h5></div>";
          header('Refresh:2, ./index.php');
      }
    ?>
  </form>
</main>

</body>
</html>
