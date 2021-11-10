<!-- TODO Application entry point. Login view -->
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
            <img class=" mb-4" src="./node_modules/bootstrap-icons/icons/box-arrow-in-right.svg" alt="" width="72" height="72">
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
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in
                </button>
            </div>

        </form>

    </main>

    <footer class=" mx-auto">
        <?php
        require_once("./assets/html/footer.html")
        ?>
    </footer>

</body>

</html>