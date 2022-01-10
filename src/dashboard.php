<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php 
session_start();

require_once("./library/employeeManager.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css">
</head>
<body class="d-flex flex-column h-100" data-new-gr-c-s-check-loaded="14.1043.0" data-gr-ext-installed="">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
    <a class="navbar-brand" href="#">Employees Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Employee</a>
        </li>
      </ul>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Log out</a>
        </li>
        </ul>
    </div>
  </nav>
</header>
<h1>Welcome <?php echo $_SESSION["loged"];?><h1>
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <div id="jsGrid"></div>
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
<script src="../assets/js/dashboard.js"></script>

      
  

</body>
</html>