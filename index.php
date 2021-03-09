<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="./node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="./node_modules/popper.js/dist/popper.min.js" defer></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js" defer></script>
</head>
<body class="d-flex flex-column h-100 w-100">

    <?php
    //Errors
    if(isset($_GET['error'])) {
        if($_GET['error'] === "Login incorrect!") {
            echo "<p id=error-login class='bg-white fixed-top py-2 text-danger text-center'>Incorrect credentials!</p>";
        } elseif ($_GET['error'] === "Session expired!") {
            echo "<p id=error-login class='bg-white fixed-top py-2 text-danger text-center'>Expired session, please login again.</p>";
        } elseif ($_GET['error'] === "Session closed!") {
            echo "<p id=error-login class='bg-white fixed-top py-2 text-danger text-center'>Closed session!</p>";
        }
    }

    include "./assets/html/login.html";

    ?>

</body>
</html>