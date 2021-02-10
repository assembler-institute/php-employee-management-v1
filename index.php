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
    <?php if (!isset($_GET['login'])) {
                exit();
        }
        else {
            $loginCheck = $_GET['login'];

            if ($loginCheck == "empty") {
                echo '<p class="error">Please fill all the fields</p>';
                exit();
            }
            elseif ($loginCheck == "invalidemail") {
                echo '<p class="error">Please write a valid email</p>';
                exit();
            }
            elseif ($loginCheck == "invaliduser") {
                echo '<p class="error">Incorrect user credentials</p>';
                exit();
            }
        }
    ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>