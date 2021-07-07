<!-- TODO Employee view -->
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management</title>

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
  <header class="bg-light mb-4">
    <?php 
      require ("../assets/html/header.html");
    ?>
  </header>
  <main class="container-xl mx-auto">
    <form action="./library/employeeController.php" method="POST" class="container-md">
      <h3>Employee: </h3>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" value="<?php echo $_SESSION["employeeUpdate"]["name"] ?>">
          </div>
          <div class="form-group">
            <label for="inputMail">Email adrress</label>
            <input type="email" class="form-control" id="inputMail" aria-describedby="emailHelp" value="<?php echo $_SESSION["employeeUpdate"]["email"] ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" value="<?php echo $_SESSION["employeeUpdate"]["city"] ?>">
          </div>
          <div class="form-group">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="inputState" value="<?php echo $_SESSION["employeeUpdate"]["state"] ?>">
          </div>
          <div class="form-group">
            <label for="inputPostalCode">Postal Code</label>
            <input type="number" class="form-control" id="inputPostalCode" value="<?php echo $_SESSION["employeeUpdate"]["postalCode"] ?>">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="inputLastName">Last Name</label>
            <input type="text" class="form-control" id="inputLastName" value="<?php echo $_SESSION["employeeUpdate"]["lastName"] ?>">
          </div>
          <div class="form-group">
          <label for="inputGender">Example select</label>
          <select class="form-control" id="inputGender">
            <option value="defect"></option>
            <option value="man">man</option>
            <option value="woman">woman</option>
            <option value="other">other</option>
          </select>
          </div>
          <div class="form-group">
            <label for="inputStreetAddress">Street Adrress</label>
            <input type="text" class="form-control" id="inputStreetAddress" value="<?php echo $_SESSION["employeeUpdate"]["streetAddress"] ?>">
          </div>
          <div class="form-group">
            <label for="inputAge">Age</label>
            <input type="number" class="form-control" id="inputAge" value="<?php echo $_SESSION["employeeUpdate"]["age"] ?>">
          </div>
          <div class="form-group">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="number" class="form-control" id="inputPhoneNumber" value="<?php echo $_SESSION["employeeUpdate"]["phoneNumber"] ?>">
          </div>
        </div>
      </div>
      <a type="btn" class="btn btn-secondary" href="dashboard.php">Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>
  <footer class="fixed-bottom">
    <?php 
      require ("../assets/html/footer.html");
    ?>
  </footer>
  <!-- <script src="../assets/js/index.js"></script> -->
</body>
</html>