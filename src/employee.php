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
       <img src="../assets/images/employee.png"/>
    </div>
  </div>
  <div class="right-container">
    <header>
      <h1>Create a New Employee </h1>
      <div class="set">
        <div class="pets-name">
          <label for="pets-name">Name</label>
          <input id="pets-name" placeholder="Name" type="text"></input>
        </div>
        <div class="pets-breed">
          <label for="pets-breed">Last name</label>
          <input id="pets-breed" placeholder="Last Name" type="text"></input>
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
          <label for="pets-breed">Email</label>
          <input id="pets-breed" placeholder="Email" type="email"></input>
        </div>
        <div class="pets-gender">
          <label for="pet-gender-female">Gender</label>
          <div class="radio-container">
            <input id="pet-gender-female" name="pet-gender" type="radio" value="female"></input>
            <label for="pet-gender-female">Woman</label>
            <input id="pet-gender-male" name="pet-gender" type="radio" value="male"></input>
            <label for="pet-gender-male">Man</label>
          </div>
        </div>
        
      </div>
      <div class="set">
      <div class="pets-breed">
          <label for="pets-breed">City</label>
          <input id="pets-breed" placeholder="City" type="text"></input>
        </div>
        <div class="pets-birthday">
          <label for="pets-birthday">Street Address</label>
          <input id="pets-birthday" placeholder="Street Address" type="text"></input>
        </div>
      </div>
      
      <div class="set">
      <div class="pets-breed">
          <label for="pets-breed">State</label>
          <input id="pets-breed" placeholder="CA" type="text"></input>
        </div>
        <div class="pets-birthday">
          <label for="pets-birthday">Age</label>
          <input id="pets-birthday" placeholder="24" type="number"></input>
        </div>
      </div>
      <div class="set">
      <div class="pets-breed">
          <label for="pets-breed">Postal Code</label>
          <input id="pets-breed" placeholder="03652" type="number"></input>
        </div>
        <div class="pets-birthday">
          <label for="pets-birthday">Phone number</label>
          <input id="pets-birthday" placeholder="632589674" type="number"></input>
        </div>
      </div>
    </header>
    <footer>
      <div class="set">
        <button id="back">Back</button>
        <button id="next">Submit</button>
      </div>
    </footer>
  </div>
</div>
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
}
echo $_SESSION["username"]; ?>

<?php include_once '../assets/html/footer.html' ?>