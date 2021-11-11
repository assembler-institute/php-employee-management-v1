<!-- TODO Application entry point. Login view -->
<?php

// TODO: verify session with checkSession() from sessionHelper. If OK -> go to dashboard without login?

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <form method="POST" action="./src/library/loginController.php">
    <label>Username
      <input type="text" name="username" required />
    </label>
    <label>Password
      <input type="password" name="password" required />
    </label>
    <input type="submit" value="Login">
  </form>
</body>


<?php

require_once('./assets/html/footer.html');

?>