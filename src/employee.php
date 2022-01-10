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
    <link rel="stylesheet" href="./../assets/css/main.css">
    <script src="./../assets/js/index.js" defer></script>
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

</body>
</html>
