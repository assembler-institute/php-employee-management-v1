<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
session_start();

if (!isset($_SESSION["loggedUsername"])) {
    header("Location:../index.php?accessDenied=true");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Assets -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="../assets/js/timeout.js"></script>
    <!-- Dependencies -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css" />
    <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css" />
    <script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Dashboard</title>
</head>

<body>
    <?php require("../assets/html/header.php") ?>
    <main class="container-fluid">
        <div id="jsGrid"></div>
    </main>
    <?php require("../assets/html/footer.html") ?>

    <script src="../assets/js/dashboard.js"></script>
</body>

</html>