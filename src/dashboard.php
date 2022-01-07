<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee management</title>
    <!-- Jquery -->
    <script src="./../node_modules/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/63f29c9463.js" crossorigin="anonymous"></script>
    <!-- jsGrid -->
    <script type="text/javascript" src="./../node_modules/jsgrid/dist/jsgrid.min.js"></script>
    <link type="text/css" rel="stylesheet" href="./../node_modules/jsgrid/dist/jsgrid.min.css"/>
    <link type="text/css" rel="stylesheet" href="./../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <!-- My styles/Scripts -->
    <link rel="stylesheet" href="./../assets/css/main.css">
    <script src="./../assets/js/index.js" defer></script>
</head>
<body>
    <!-- get header.html content -->
    <?php echo file_get_contents("./../assets/html/header.html", true);
    ?>
    <div id="jsGrid">

    </div>
</body>
</html>