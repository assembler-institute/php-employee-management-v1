<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
session_start();
if(!isset($_SESSION)){
    header("location:./../index.php?notlogged=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("./../assets/html/header.html"); ?>
    <title>Employee management</title>
    <!-- jsGrid -->
    <script type="text/javascript" src="./../node_modules/jsgrid/dist/jsgrid.min.js" defer></script>
    <link type="text/css" rel="stylesheet" href="./../node_modules/jsgrid/dist/jsgrid.min.css"/>
    <link type="text/css" rel="stylesheet" href="./../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <!-- My styles -->
    <script src="./../assets/js/index.js" defer></script>
</head>
<body>
    
    <div id="jsGrid">

    </div>
</body>
</html>