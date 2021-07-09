<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Management</title>
    <link
      rel="stylesheet"
      href="./node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link href="./assets/css/login.css" rel="stylesheet" />

  </head>
  <body class="text-center">
    <form class="form-signin" action="./src/library/loginController.php" method="POST">
      <img
        class="mb-4"
        src="./node_modules/bootstrap-icons/icons/box-arrow-in-right.svg"
        alt=""
        width="72"
        height="72"
      />
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input
        type="email"
        id="inputEmail"
        name="email"
        class="form-control"
        placeholder="Email address"
        required=""
        autofocus=""
      />
      <label for="inputPassword" class="sr-only">Password</label>
      <input
        type="password"
        id="inputPassword"
        name="pwd"
        class="form-control"
        placeholder="Password"
        required=""
      />
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
        Sign in
      </button>
      <p class="mt-5 mb-3 text-muted">PHP Employee Management</p>
      <?php 
      if(isset($_GET['error'])){
        if($_GET['error'] == "invaliduser"){
          echo "<div class='alert alert-danger'> <h3>This user is invalid. <br>Input a valid user please.</h3></div>";
          unset($_GET['error']);
        } elseif($_GET['error'] == "invalidpwd"){
          echo "<div class='alert alert-danger'> <h3> Password is not correct . <br>Input the correct password please.</h3></div>";
        }
      }
      if(isset($_GET['sessionExpired']) && $_GET['sessionExpired'] == true) {
          echo "<div class='alert alert-danger'> <h3> The session has expired </h3></div>";
      } elseif(isset($_GET['logOut']) && $_GET['logOut'] == true) {
          echo "<div class='alert alert-success'> <h3> Log Out succesful</h3></div>";
          header('Refresh:5, ./index.php');
      }
    ?>
    </form>
  </body>
</html>
