<!-- TODO Employee view -->
<?php
require_once("./library/sessionHelper.php");
checkSession();
include_once("header.php");
?>

    <main>
      <sectiion class="employee__form__containeer">
        <form method="POST" action="./library/employeeController.php"  class="employee__form" id="employeeForm">
          <input type="hidden" name="newEmployee" value="new">
          <input  type="text" name="name" placeholder="Name" class="form__input" />
          <input type="text" name="lastName" placeholder="Last Name" class="form__input" />
          <input type="email" name="email" placeholder="Email" class="form__input" />
          <select name="gender" class="form__input">
            <option selected value="man">Male</option>
            <option value="woman">Female</option>
          </select>
          <input type="text" name="city" placeholder="City" class="form__input" />
          <input type="number" name="streetAddress" placeholder="Street Address" class="form__input" />
          <input type="text" name="state" placeholder="State" class="form__input" />
          <input type="number" name="age" placeholder="Age" class="form__input" />
          <input type="number" name="postalCode" placeholder="Postal Code" class="form__input" />
          <input type="tel" name="phoneNumber" placeholder="Phone Number" class="form__input" />
          <div class="employee__form__btn__container">
            <button type="submit" id="submitForm" class="formSubmitBtn primary__btn">SUBMIT</button>
          </div>
        </form>
        <button id="formReturnBtn" class="primary__btn">RETURN</button>
      </sectiion>
    </main>
  </body>
</html>
