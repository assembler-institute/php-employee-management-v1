<!-- TODO Application entry point. Login view -->
<?php
//header("Location: src/library/loginManager.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>PHP-SESSION</title>
</head>

<body class="text-center">

    <section class="content-center">
        <form class="form-signin" method="POST" action="src/library/loginController.php">
            <img class="mb-4" src="./assets/img/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <?php
            if (isset($loginerror)) {
                echo "<div class='alert alert-danger fade show' align='center' vertical-center>";
                echo "<span class='align-middle'>$loginerror</span>";
                echo "</div>";
            }
            ?>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </section>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>