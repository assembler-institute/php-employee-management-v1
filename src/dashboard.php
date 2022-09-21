<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!-- <?php
// require_once("./library/sessionHelper.php");
// checkSession();
// $userName = $_SESSION["username"]; //$_SESSION["username]; en linea 54.
?> -->

<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php 
require_once("./library/sessionHelper.php");
checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <!-- ------------- FOR JS-GRID ------------- -->
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <title>Document</title>
  <style>
  .hide {
    display: none;
  }
  </style>

</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Alumni Dashboard</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="badge bg-primary text-wrap mx-2">
      <?= $_SESSION["username"] ?>
    </div>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="./library/loginController.php">Sign out</a>
      </li>
    </ul>
  </header>
  <!-- <h1><?php echo "Welcome Papafrita, ". $_SESSION["username"]?></h1> -->
  <div id="jsGrid"></div>
  <script src="../assets/js/jsgrid.js"></script>
</body>

</html>
<?php include_once '../assets/html/footer.html' ?>