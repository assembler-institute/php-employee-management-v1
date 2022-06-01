<!-- TODO Application entry point. Login view -->
<?php

require_once('./src/library/loginManager.php');
$alert = checkSession();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="./src/library/loginController.php" method="post">
        <div>
            <label for="">Email address</label>
            <input type="email" name="email" id="">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="pass" id="">
        </div>
        <button type="submit" name="login" value="login">Sign in</button>

        <?php
        echo $alert;

        ?>

    </form>
    
</body>
</html>

<!-- CRUD => Create, Read, Update and Delete -->