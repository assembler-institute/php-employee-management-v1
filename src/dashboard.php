<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee dashboard</title>
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
  <header class="bg-light">
    <?php 
      require ("../assets/html/header.html");
    ?>
  </header>
  <main class="mx-auto">
    <h3>Employees:</h3>
    <div></div>
  </main>
  <footer>
    <?php 
      require ("../assets/html/footer.html");
    ?>
  </footer>
  <script src="../assets/js/index.js"></script>
</body>
</html>