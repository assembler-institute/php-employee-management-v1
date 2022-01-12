<!-- TODO Employee view -->
<?php 
session_start();

require_once("./library/employeeManager.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>
<body class="d-flex flex-column h-100" data-new-gr-c-s-check-loaded="14.1043.0" data-gr-ext-installed="">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
    <a class="navbar-brand" href="#">Employees Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Employee</a>
        </li>
      </ul>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Log out</a>
        </li>
        </ul>
    </div>
  </nav>
</header>
<h1>Welcome <?php echo $_SESSION["loged"];?></h1>
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <form class="w-50 mx-auto" method="POST" action=<?= isset($_GET["id"]) ? "./library/employeeController.php?editEmployee ": "./library/employeeController.php?addEmployee_Form" ?>>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputName">Name</label>
              <input type="text" class="form-control" name="name" id="inputName">
          </div>
          <div class="form-group col-md-6">
              <label for="inputLastName">Last Name</label>
              <input type="text" class="form-control" name="lastName" id="inputLastName">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputEmail">Email Address</label>
              <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelpInline">
              <small id="emailHelpInline" class="text-muted">
                  We'll always share your email with anyone else.
                </small>
          </div>
          <div class="form-group col-md-6">
              <label for="inputGender">Gender</label>
              <select id="inputGender" name="gender" class="form-control" >
                <option>Male</option>
                <option>Female</option>
                </select>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" name="city" id="inputCity">
          </div>
          <div class="form-group col-md-6">
              <label for="inputStreetAddress">Street Address</label>
              <input type="text" class="form-control" name="streetAddress" id="inputStreetAddress">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputState">State</label>
              <input type="text" class="form-control" name="state" id="inputState">
          </div>
          <div class="form-group col-md-6">
              <label for="inputAge">Age</label>
              <input type="number" class="form-control" name="age" id="inputAge">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputPostalCode">Postal Code</label>
              <input type="number" class="form-control" name="postalCode" id="inputPostalCode">
          </div>
          <div class="form-group col-md-6">
              <label for="inputPhoneNumber">Phone Number</label>
              <input type="text" class="form-control" name="phoneNumber" id="inputPhoneNumber">
          </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-secondary" href="./dashboard.php" role="button">Return</a>
  </form>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
  

</body>
</html>