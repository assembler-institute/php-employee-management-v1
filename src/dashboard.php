<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<html>

<head>
  <title>Inline Table Insert Update Delete in PHP using jsGrid</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/main.css">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <script src="../assets/js/index.js" defer></script>
  <style>
    .hide {
      display: none;
    }
  </style>
</head>
<body>
  <?php
session_start();

  require ("./../assets/html/header.html");
  require ("./library/sessionHelper.php");
  require ("./library/loginManager.php");
  // print_r(time());
  // echo "<br>";
  // print_r($_SESSION['last_access']);
  if(isset($_SESSION['last_access']) && time() - $_SESSION['last_access'] > 600){ //llamamos a la funcion que lleva el tiempo establecido que esta en el loginManager
    sessionDestroy("location:../index.php");
  }

  ?>
  <div class="container">
    <br />
    <div class="table-responsive">
      <h3 align="center">Inline Table Insert Update Delete in PHP using jsGrid</h3><br />
      <div id="grid_table"></div>
    </div>
  </div>
  <form action="../index.php" method="post"></form>
  <?php
  require ("./../assets/html/footer.html");
  ?>
</body>
</html>