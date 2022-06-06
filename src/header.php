<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          <button id="logoutBtn" class="secondary__btn">LOGOUT</button>
        </div>
    <div>
      <?= $_SESSION["user"] ?>
    </div>
      </nav>
    </header>