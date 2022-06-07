<!-- TODO Employee view -->
<?php
require_once("./library/sessionHelper.php");
checkSession();
include_once("header.php");
?>

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
