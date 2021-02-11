<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <?php include_once('./assets/html/loginForm.html'); ?>
    <?php include_once('./src/library/errorHandler.php'); ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>