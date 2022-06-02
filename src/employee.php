<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMPLOYEE</title>
  </head>
  <body>
    <header>
      <div id="logo" class="logo__container">
        <img src="" alt="" />
      </div>
      <h1>EMPLOYEE MANAGEMENT</h1>
    </header>
    <nav>
      <div class="links__container">
        <span id="dashboardLink" class="links__container--item">DASHBOARD</span>
        <span id="employeeLink" class="links__container--item">EMPLOYEE</span>
      </div>
      <div class="logout__btn_container">
        <button id="logoutBtn" class="secondary__btn">LOGOUT</button>
      </div>
    </nav>
    <main>
      <sectiion class="employee__form__containeer">
        <form class="employee__form" id="employeeForm">
          <input type="text" class="form__input" />
          <input type="text" class="form__input" />
          <input type="text" class="form__input" />
          <input type="text" class="form__input" />
          <select class="form__input">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option selected value="gender">Gender</option>
          </select>
          <input type="text" class="form__input" />
          <input type="text" class="form__input" />
          <input type="text" class="form__input" />
          <input type="text" class="form__input" />
          <input type="text" class="form__input" />
        </form>
        <div class="employee__form__btn__container">
          <button class="formSubmitBtn primary__btn">SUBMIT</button>
          <button id="formReturnBtn" class="primary__btn"></button>
        </div>
      </sectiion>
    </main>
  </body>
</html>
