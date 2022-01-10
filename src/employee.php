<!-- TODO Employee view -->
<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:./../index.php?notlogged=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("./../assets/html/header.html"); ?>
    <title>Employee</title>
    <!-- my scripts -->
    <script src="./../assets/js/employee.js" defer></script>
</head>
<body>

</body>
</html>
