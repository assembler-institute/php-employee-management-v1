<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/main.css">
    <script type="module" src="../assets/js/index.js"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');</style>
    <title>Document</title>
  </head>
  <body>
    <header>
      <div id="logo" class="logo__container">
        <img src="" alt="" />
      </div>
      <h1>EMPLOYEE MANAGEMENT</h1>
      <nav>
        <div class="links__container">
          <span id="dashboardLink" class="links__container--item">DASHBOARD</span>
          <span id="employeeLink" class="links__container--item">EMPLOYEE</span>
        </div>
        <div class="logout__btn_container">
        <a class="logout__btn" href="../src/library/loginController.php?logout=true" name="logout">LogOut</a>
      </div>
    <div>
      <?= $_SESSION["user"] ?>
    </div>
      </nav>
    </header>