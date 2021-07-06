<?php
session_start();
if (isset($_SESSION['authUserId'])) {
    http_response_code(401);
    header('Location:src/dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Sign in</title>
</head>

<body class="text-center">
    <section class="content-center">
        <img class="my-4" src="./assets/img/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <form id="login" class="form-signin" method="POST">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <div id="login-error" class='mt-3 alert alert-danger fade' align='center' vertical-center>
                <span class='align-middle msg-login'>login error</span>
            </div>
        </form>
    </section>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $('#login').on('submit', function(e) {
            e.preventDefault();
            const email = $(this).find('#inputEmail');
            const pass = $(this).find('#inputPassword');

            $.ajax({
                url: "src/library/loginController.php",
                type: "post",
                dataType: "json",
                data: {
                    'action': 'login',
                    'email': email.val(),
                    'password': pass.val(),
                },
                success: function(data, status) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    let err = JSON.parse(xhr.responseText);
                    $('#login-error').addClass('show');
                    $('.msg-login').text(err.message);

                }
            })
        })
    </script>
</body>

</html>