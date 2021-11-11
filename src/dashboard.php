<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>

    <script src="../assets/js/jsGrid.js" type="module"></script>




    <!-- <script src="../node_modules/jquery/dist/jquery.min.js" type="module"></script>
    <link rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css" />
    <link rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <script src="../node_modules/jsgrid/dist/jsgrid.min.js" type="module"></script> -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>


</head>

<body class="d-flex flex-column justify-content-center align-items-center w-100">
    <?php include("../assets/html/header.html"); ?>

    <main>
        <div id="jsGrid"></div>
    </main>

    <?php include("../assets/html/footer.html"); ?>

</body>

</html>