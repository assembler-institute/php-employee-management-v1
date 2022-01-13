<!-- TODO Application entry point. Login viewsss -->
<?php
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <div class="login-clean">
    <?php 
    if(isset($_GET["logout"])){
        echo '<div class="alert alert-success alert-dismissible fade show w-75 mx-auto" role="alert">
        The user has been logged out from the webpage.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <form action="./src/library/loginController.php?login" method="POST">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img class="mb-4" src="./assets/img/assamblericon.png" alt="user icon" width="70" height="70"></i></div>
            <div class="form-floating">
                <label for="floatingInput">Write your user name</label>
                        <input name="user" type="text" class="form-control" id="floatingInput" placeholder="User name" required>
                        
                    </div>
                    <div class="form-floating">
                    <label for="floatingPassword" >Password</label>   
                        <input name="password"  type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        
                    </div><br>
                    <?php
                    switch (true) {
                        case (isset($_GET["WEmailPass"])):
                            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
                            echo "Wrong email and password";
                            echo "</div>";
                            break;

                        case (isset($_GET["WName"])):
                            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
                            echo "Wrong name";
                            echo "</div>";
                            break;

                        case (isset($_GET["WPass"])):
                            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
                            echo "Wrong Password";
                            echo "</div>";
                            break;

                        default:
                            break;
                    }
                    ?>
            <button type="submit" class="btn btn-outline-info">Submit</button>
    </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>