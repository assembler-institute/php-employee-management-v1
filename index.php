<!DOCTYPE html>
<html lang="en">
<?php include_once('./src/library/sessionHelper.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>PHP Employee Management V1</title>
</head>

<body>
    <div class="d-flex login-container align-items-center justify-content-center">
        <div class="login-form p-5 rounded">
            <h3>Login</h3>
            <form id="formLogin" action="" method="post">
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" required />
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Your Password *" name="password" value="" required />
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btnSubmit" value="Login" />
                </div>
            </form>
            <div class="text-danger"></div>
        </div>
    </div>
</body>
<script src="./assets/js/index.js"></script>
</html>