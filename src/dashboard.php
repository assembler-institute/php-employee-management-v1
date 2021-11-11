<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.core.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.load-indicator.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.load-strategies.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.sort-strategies.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.validation.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.field.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.text.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.select.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.number.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.checkbox.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.control.js"></script>
    <script src="../assets/js/index.js"></script>

    <title>Employee dashboard</title>
</head>

<body>
    <header>
        <?php
        require_once("../assets/html/header.html")
        ?>
    </header>

    <main>
        <div id="jsGrid" class="mt-5 container"></div>

    </main>

</body>

</html>