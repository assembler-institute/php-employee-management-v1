<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
  

  session_start();
  require_once('./library/sessionHelper.php');
  checkExpiredSession();
  if(!isset($_SESSION)){
    header("Location : ../index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee dashboard</title>

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css">
  <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css">

  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/jsgrid/src/jsgrid.core.js"></script>
  <script src="../node_modules/jsgrid/src/jsgrid.load-indicator.js"></script>
  <script src="../node_modules/jsgrid/src/jsgrid.load-strategies.js"></script>
  <script src="../node_modules/jsgrid/src/jsgrid.sort-strategies.js"></script>
  <script src="../node_modules/jsgrid/src/jsgrid.validation.js"></script>
  <script src="../node_modules/jsgrid/src/jsgrid.field.js"></script>
  <script src="../node_modules/jsgrid/src/fields/jsgrid.field.text.js"></script>
  <!-- <script src="../node_modules/jsgrid/src/fields/jsgrid.field.select.js"></script> -->
  <script src="../node_modules/jsgrid/src/fields/jsgrid.field.number.js"></script>
  <script src="../node_modules/jsgrid/src/fields/jsgrid.field.checkbox.js"></script>
  <script src="../node_modules/jsgrid/src/fields/jsgrid.field.control.js"></script>
</head>

<body>
  <header class="bg-light mb-4 ">
    <?php 
      require_once("../assets/html/header.html");
    ?>
  </header>
  <main class="container-xl mx-auto">
    <h3>Employees:</h3>
    <div id="jsGrid" class="pb-4"></div>
  </main>
  <footer class="fixed-bottom">
    <?php 
      require ("../assets/html/footer.html");
    ?>
  </footer>
  <script src="../assets/js/index.js"></script>
</body>
</html>
