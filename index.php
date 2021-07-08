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
    <title>Employee Management</title>
</head>

<body>
    <div class="auth-wrapper">
        <section class="content-center text-center image-section">
            <section class="content-wrapper">
                <h1>Employee Management</h1>
                <img src="./assets/img/user-management-2.gif" width="100%" height="60%" />
            </section>
        </section>
        <section class="content-center text-center auth-form">
            <form class="form-signin" method="POST" id="login">
                <img class="mb-4" src="./assets/img/logo.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <?php
                if (isset($loginerror)) {
                    echo "<div class='alert alert-danger fade show' align='center' vertical-center>";
                    echo "<span class='align-middle'>$loginerror</span>";
                    echo "</div>";
                }
                ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </section>
    </div>

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