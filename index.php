<!-- TODO Application entry point. Login view -->
<?php
session_start();

$msg;
if(isset($_GET['login'])){
    $msg = 'Your login was not correct';
}else{
    $msg= '';
}

if(isset($_SESSION['name'])){
    header('location: ./src/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/js/index.js" type="module"></script>
</head>
<body>
    <form action="./src/library/loginController.php" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
        <span><?=$msg?></span>
    </form>
</body>
</html>