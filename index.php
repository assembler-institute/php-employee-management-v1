<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html>

<head>
    <title>Ajax Test</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="./src/library/loginManager.php" method="POST">
            <h3 class="mb-3">PLEASE LOGIN</h3>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="login-name" name="login-name">
                <label for="login-name">Email address or username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="login-pass" name="login-pass">
                <label for="login-pass">Password</label>
            </div>

            <div class="mb-3">
                <?php require_once "./src/library/sessionHelper.php";
                    if (isset($_GET["error"])) {
                        echo "<p class='alert alert-danger'>Password or Username is incorrect.<p>";
                    } else if (isset($_GET["notLogged"])){
                        echo "<p class='alert alert-danger'>Access denied. Please log in.<p>";
                    }
                    indexLogCheck();
                ?>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">SIGN IN</button>
        </form>
    </main>
</body>
</html>