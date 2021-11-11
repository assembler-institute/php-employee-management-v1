<!-- TODO Application entry point. Login view -->
<?php

require_once('./assets/html/header.html');

// TODO: verify session with checkSession() from sessionHelper. If OK -> go to dashboard without login?

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


<?php

require_once('./assets/html/footer.html');

?>