<?php
require_once("./src/library/loginManager.php");
session_start();
$error = ( ( isset($_SESSION['isRedirecting']) && $_SESSION['isRedirecting'] ) ? checkRedirection() : checkSession());
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Employee Management - Login</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"/>
    <link href="./assets/css/signin.css" rel="stylesheet">
  </head>
    <body>
      <main id="mainContainer" class="form-signin text-center">
        <?=($error) ? "<div class='alert alert-$error[status]'  role='alert'> $error[message] </div>" : "" ?>
      </main>
    </body>
</html>
 <script src="./assets/js/templates/loginFormTemplate.js" ></script>

