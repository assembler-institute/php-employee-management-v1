<!-- TODO Application entry point. Login view -->
<?php
require_once("src/library/sessionHelper.php");
 checkSession();
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
    <main>
      <section class="login__container">
        <form id="loginForm" method="POST" action="src/library/loginController.php" class="login__form">
          <label for="username">adriaaaaaaa</label>
          <input type="text" class="form__input" name="username" />
          <input type="password" class="form__input" name="password" />
          <button class="primary__btn" id="loginFormSubmitBtn">LOGIN</button>
        </form>
        <div>

        <?php 

        if(isset($_SESSION["loginError"] )){
          echo $_SESSION["loginError"];
        }
        
        ?>
        </div>
      
      </section>
    </main>
  </body>
</html>
