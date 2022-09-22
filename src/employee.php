<!-- TODO Employee view -->
<?php 
  session_start();
  require_once('library/sessionHelper.php');
  userConnected();
  exitSessionTimer();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee</title>
    <script src="assets/js/index.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css" >
    <link rel="stylesheet" href="../assets/css/employee.css" >
    <script src="https://kit.fontawesome.com/fe24ce668c.js" crossorigin="anonymous" defer></script>
  </head>
  <body>

    <header>
      <?php require_once('../assets/html/header.html') ?>
    </header>
    <main>
      <?php
        if (isset($_GET['id'])) {
          $employeeId = $_GET['id'];
          require_once("library/employeeManager.php");
          getEmployee($employeeId);
        }
      ?>
    </main>
    <footer>
      <?php require_once('../assets/html/footer.html') ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>