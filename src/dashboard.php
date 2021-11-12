<?php

    session_start();

    require_once("../assets/html/header.html");

    $name = $_SESSION['username'];

    chmod('../resources/employees.json', 0777);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <link rel="icon" href="./favicon.svg">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script type="module" src="../assets/js/index.js" defer></script>
</head>

<body>
    <div id="jsGrid"></div>
</body>

<?php

    require_once("../assets/html/footer.html");

?>

</html>