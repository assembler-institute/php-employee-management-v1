<?php
require_once("./library/loginManager.php");

checkSession();

include_once '../assets/html/header.html'
?>

<form action="./library/employeeController.php" method="POST" class="container mt-4">
  <div class="row">
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingName">Name</label>
      <input name="name" type="text" class="form-control" id="floatingName" placeholder="John" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingLastName">Last name</label>
      <input name="lastname" type="text" class="form-control" id="floatingLastName" placeholder="Doe" title="">
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingEmail">Email address</label>
      <input name="email" type="email" class="form-control" id="floatingEmail" placeholder="john.doe@example.com" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingGender">Gender</label>
      <select name="gender" class="form-control" id="floatingGender" data-bs-toggle="tooltip" data-bs-html="true">
        <option value="man">Man</option>
        <option value="woman">Woman</option>
        <option value="other">Other</option>
      </select>
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingCity">Last name</label>
      <input name="city" type="text" class="form-control" id="floatingCity" placeholder="Barcelona" title="">
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingStreetAddress">Street address</label>
      <input name="email" type="text" class="form-control" id="floatingStreetAddress" placeholder="324" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingState">State</label>
      <input name="state" type="text" class="form-control" id="floatingState" placeholder="Catalunya" title="">
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingAge">Age</label>
      <input name="age" type="number" class="form-control" id="floatingAge" placeholder="18" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingPostalCode">Postal code</label>
      <input name="postalCode" type="number" class="form-control" id="floatingPostalCode" placeholder="Catalunya" title="">
    </div>
    <div class="col-sm-6 form-floating  mt-3">
      <label for="floatingPhoneNumber">Phone number</label>
      <input name="phoneNumber" type="number" class="form-control" id="floatingPhoneNumber" placeholder="666666666" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-12 form-floating  mt-3">
      <?= ($alert) ? "<div class='alert alert-$alert[type] role='alert'>$alert[text]</div>" : "" ?>
    </div>
    <div class="col-12 form-floating mt-3">
      <button class="btn btn-primary" type="submit">Submit</button>
      <button class="btn btn-secondary" onclick="goBack()">Return</button>
    </div>
  </div>
</form>

<script>
  function goBack() {
    window.history.back();
  }
</script>

<?php include_once '../assets/html/footer.html'; ?>