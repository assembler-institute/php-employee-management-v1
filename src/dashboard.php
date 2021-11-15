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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script type="module" src="../assets/js/index.js" defer></script>
</head>


<body>
    <?php

    session_start();

    require_once("../assets/html/header.html");

    if (isset($_GET["action"]) && $_GET["action"] === "deleted") {
        echo "
                <div class='align-items-center text-white bg-primary border-0 w-25 mx-auto' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='d-flex'>
                        <div class='toast-body'>
                            <span id='employee-deleted'>Employee successfully deleted.</span> 
                        </div>
                        <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                </div>";
    }

    if (isset($_GET["action"]) && $_GET["action"] === "updated") {
        echo "
                <div class='align-items-center text-center text-white bg-primary border-0 w-25 mx-auto' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='d-flex text-center'>
                        <div class='toast-body'>
                            <span class='text-center'>Employee successfully updated.</span> 
                        </div>
                        <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                </div>";
    }

    ?>

    <div id="jsGrid"></div>
</body>

<?php

require_once("../assets/html/footer.html");

?>

</html>