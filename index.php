<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="loginForm" action="./src/library/loginController.php" method="post">
        <label for="user">Username:</label>
        <input name="username" type="text">
        <label for="pass">Password:</label>
        <input name="pass" type="pass">
        <input type="submit">
    </form>
    <div id="alert-box">

    </div>
</body>
</html>