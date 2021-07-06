<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Dashboard</title>
</head>

<body class="d-flex flex-column h-100">
    <?php
    include "../assets/html/header.html";
    ?>

    <div class="container-fluid">

        <main class="col-lg-10 p-2 mx-auto gy-2">
            <div>
                <h2>Employees</h2>
            </div>
            <div id="jsGrid"></div>
        </main>
    </div>


    <?php
    include "../assets/html/footer.html";
    ?>
</body>

<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
<script type="text/javascript" src="../assets/js/jsgrid.js"></script>

</html>