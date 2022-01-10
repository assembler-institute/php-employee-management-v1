<!-- TODO Employee view -->
<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:./../index.php?notlogged=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/63f29c9463.js" crossorigin="anonymous"></script>
    <!-- My styles/Scripts -->
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<?php echo file_get_contents("./../assets/html/header.html", true);
?>
    <p id="nameLogged"><?php $_SESSION["user"] ?></p>
</div>

                        <button class="btn btn-outline-warning">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <section class="m-0 vh-100 row justify-content-center align-items-center">
            <form class="col-auto p-5 text-center bg-light">
            <div class="mb-3">
                <label>Name</label>
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="usermail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            </form>
        </section>

</body>
</html>
