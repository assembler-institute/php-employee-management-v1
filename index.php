<!-- TODO Application entry point. Login view -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Employee</title>
</head>
<body>
    <!-- Login -->
    <div id="logreg-forms">
        <form class="form-signin" method="POST" action="./src/library/loginController.php?login=true">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <br>
            <?php
            session_start();
            if(isset($_SESSION["login"])){
                if($_SESSION["login"] === "failed"){
                    unset($_SESSION["login"]);?>
                    <div class="alert alert-danger" role="alert">
                        Invalid email or password.
                    </div>
                    <?php
                }
            }
            ?>
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
        </form>
    </div>
</body>
</html>