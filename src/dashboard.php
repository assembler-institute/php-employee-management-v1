<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    // session_start();

    // if (isset($_SESSION["userId"])){
    //     require("./library/sessionHelper.php");
    // }else{
    //     $url = '../index.php';
    //     header("Refresh: 0; URL=$url?error=You aren't logged in");
    //     exit();
    // }

    include '../assets/html/header.html';
    include '../assets/html/dashboard.html';
    include '../assets/html/footer.html';
    ?>

    <script src="../assets/js/dashboard.js" type="module"></script>
    
    <script src="../assets/js/index.js"></script>
</body>
</html>
