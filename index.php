<!-- TODO Application entry point. Login view -->
<?php

// TODO: verify session with checkSession() from sessionHelper. If OK -> go to dashboard without login?

require_once("./src/library/sessionHelper.php");

checkSessionToDashboard();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="icon" href="./favicon.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>

  <div class="vh-100 d-flex flex-column justify-content-center align-items-center">
    <?php
      if(isset($_GET['status']) && $_GET['status'] === "loggedOut") {
        echo "<div>Succesfully logged out, we hope to see you again soon</div>";
      } elseif (isset($_GET['status']) && $_GET['status'] === "sessionTimeOut") {
        echo "<div>Sorry, your session expired, please login again</div>";
      }

      if(isset($_GET['error'])) {
        if ($_GET['error'] === "unregistered") {
          echo "<div>Sorry, your user isn't in our database, please try again</div>";
        } elseif ($_GET['error'] === "password") {
          echo "<div>Incorrect password, please try again</div>";
        }
      }
    ?>

    <form method="POST" action="./src/library/loginController.php">
      <label>Username
        <input type="text" name="username" required />
      </label>
      <label>Password
        <input type="password" name="password" required />
      </label>
      <input type="submit" value="Login">
    </form>
  </div>
</body>


<?php

require_once('./assets/html/footer.html');

?>