<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
}
echo $_SESSION["username"];?>
<?php
include_once '../assets/html/header.html';
?>

<div class="signup-container">
  <div class="left-container">
    <h1>
      <!-- <i class="fas fa-paw"></i> -->
      New Employee
    </h1>
    <div class="puppy">
      <img src="../assets/images/employee.png" />
    </div>
  </div>
  <div class="right-container">
    <form action="../src/library/employeeController.php" method="POST">
      <header>
        <h1>Create a New Employee </h1>
        <div class="set">
          <div class="pets-name">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="Name" type="text"></input>
          </div>
          <div class="pets-breed">
            <label for="lastname">Last name</label>
            <input id="lastname" name="lastname" placeholder="Last Name" type="text"></input>
          </div>
          <!--   <div class="pets-photo">
            <button id="pets-upload">
              <i class="fas fa-camera-retro"></i>
            </button>
            <label for="pets-upload">Upload a photo</label>
          </div> -->
        </div>
        <div class="set">
          <div class="pets-breed">
            <label for="email">Email</label>
            <input id="email" name="email" placeholder="Email" type="email"></input>
          </div>
          <div class="pets-gender">
            <label for="gender-female">Gender</label>
            <div class="radio-container">
              <input id="gender-female" name="gender" type="radio" value="woman" checked></input>
              <label for="gender-female">Woman</label>
              <input id="gender-male" name="gender" type="radio" value="male"></input>
              <label for="gender-male">Man</label>
            </div>
          </div>

        </div>
        <div class="set">
          <div class="pets-breed">
            <label for="city">City</label>
            <input id="city" name="city" placeholder="City" type="text"></input>
          </div>
          <div class="pets-birthday">
            <label for="street">Street Address</label>
            <input id="street" name="street" placeholder="Street Address" type="text"></input>
          </div>
        </div>

        <div class="set">
          <div class="pets-breed">
            <label for="state">State</label>
            <input id="state" name="state" placeholder="CA" type="text"></input>
          </div>
          <div class="pets-birthday">
            <label for="age">Age</label>
            <input id="age" name="age" placeholder="24" type="number"></input>
          </div>
        </div>
        <div class="set">
          <div class="pets-breed">
            <label for="cp">Postal Code</label>
            <input id="cp" name="cp" placeholder="03652" type="number"></input>
          </div>
          <div class="pets-birthday">
            <label for="phone">Phone number</label>
            <input id="phone" name="phone" placeholder="632589674" type="number"></input>
          </div>
        </div>
      </header>
    </form>
    <footer>
      <div class="set">
        <button id="back" >Back</button>
        <button id="next" type="submit">Submit</button>
      </div>
    </footer>
  </div>
</div>


<?php include_once '../assets/html/footer.html'?>