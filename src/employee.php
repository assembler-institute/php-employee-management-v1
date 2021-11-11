<?php
require_once("./library/sessionHelper.php");
startSession();

if (!getSessionValue("user")) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Manager - Form</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
</head>

<body>
    <?php include("./notifications.php"); ?>
    <?php include("../assets/html/header.html"); ?>
    <?php include("../assets/html/form.html"); ?>
    <?php include("../assets/html/footer.html"); ?>
</body>

</html>