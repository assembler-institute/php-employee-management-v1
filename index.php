<?php
require_once('./src/library/sessionHelper.php');
# LogOut user by inactivity
$logout = isset($_GET['logout']) ? true : false;

if ($logout) {
    destroySession();
} else {
    # Redirect logged User
    $logged = verifyLogin();
    if ($logged) {
        header('Location: ./src/dashboard.php');
        exit();
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">

    <title>PHP Employee V1</title>
</head>

<body class="d-flex justify-content-between flex-column vh-100">

    <header>
        <div class="navbar navbar-dark bg-dark">
            <h2 class="navbar-brand mx-auto">Employee Management System</h2>
        </div>
    </header>

    <main class="container">

        <form class="form-signin w-25 p-3 center mx-auto text-center" action="./src/library/loginController.php" method="POST">
            <!--<img class=" mb-4" src="./node_modules/bootstrap-icons/icons/box-arrow-in-right.svg" alt="" width="72" height="72">-->
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input name="email" type="email" id="inputEmail" class="form-control mt-3" placeholder="Email address" required="" autofocus="">
            </div>
            <div class="form-group ">
                <label for="inputPassword" class="sr-only">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control mt-3" placeholder="Password" required="">
            </div>
            <div class="checkbox mb-3 mt-3">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in
                </button>
            </div>
            <!-- Show an alert if error -->
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];

            ?><div class="alert alert-danger" role="alert"><?php
                                                            echo "There is an error with your $error";
                                                            ?></div><?php
                                                                }
                                                                    ?>
            </div>
        </form>


        <?php

        $logoutMessage = isset($_GET["logout"]) ? $_GET["logout"] : "";

        if ($logoutMessage === "timeout") {
            echo "<div class='alert alert-danger bottom-right' role='alert'>
                          <strong>  Session Timed out, Please Log in Again! </strong>
                       </div>";
        } elseif ($logoutMessage === "user") {
            echo "<div class='alert alert-success bottom-right' role='alert'>
                         <strong>   Logged out. Hope to see you again Soon! </strong>
                       </div>";
        }

        ?>

    </main>

    <footer class=" mx-auto">
        <?php
        require_once("./assets/html/footer.html")
        ?>
    </footer>

</body>

</html>