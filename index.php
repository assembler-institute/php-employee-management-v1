<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Jquery -->
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
    <!-- My styles -->
    <link href="./assets/css/login.css" rel="stylesheet">
    <script src="./assets/js/index.js" defer></script>
    <title>Employee manager</title>
</head>

<body>
    <!-- If user tries to go somewhere with url, he come to index -->
    <div class="msgContainer">
        <?php 
           if(isset($_GET["notlogged"])){
                echo '
                    <div class="alert alert-warning" role="alert">
                        You need to log in to access
                    </div>
                ';
            }else if(isset($_GET["logout"])){
                echo '
                    <div class="alert alert-success" role="alert">
                        You successfully logged out
                    </div>
                ';
            }
        ?>
            
    </div>
<!-- Login section -->
    <section class="m-0 vh-100 row justify-content-center align-items-center">
        <form method="post" action="./src/library/loginController.php" class="col-auto p-5 text-center bg-light login-form">
            <img src="assets/imgs/user-circle-solid.svg" class="iconUser filter">
            <h2>Login</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="usermail" class="form-control iconMail" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <!-- Display error if email is not correct (see in loginController.php) -->
                <div class="errorForm">
                    <?php
                        if(isset($_GET["fail"]) && $_GET["fail"]=="email") {
                                    echo '
                                    <div class="alert alert-danger" role="alert">
                                        Please introduce the correct email
                                    </div>';
                        }
                ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control  iconPassword" id="exampleInputPassword1" name="password" required>
                <div class="errorForm">
                    <?php
                        if(isset($_GET["fail"]) && $_GET["fail"]=="pass") {
                                    echo '
                                    <div class="alert alert-danger" role="alert">
                                        Please introduce the correct pass
                                    </div>';
                        }
                    ?>
                </div>
            </div>
            <button id="submit" type="submit" class="btn btn-warning">Login</button>
        </form>
    </section>

</body>

</html>