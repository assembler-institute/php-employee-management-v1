<!-- TODO Employee view -->
<?php 
require_once('./library/sessionHelper.php');
checkSession();
checkSessionTime();
require_once("./library/employeeManager.php");
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $employee = getEmployee($id);
}


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

    
<?php require_once "../assets/html/header.php" ?>
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <?php 
    if(isset($_GET["created"])){
        echo '<div class="alert alert-success alert-dismissible fade show w-75 mx-auto" role="alert">
        Employee <strong>'.$employee["name"].'</strong> has been added to the database.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <?php 
    if(isset($_GET["updated"])){
        echo '<div class="alert alert-warning alert-dismissible fade show w-75 mx-auto" role="alert">
        Employee <strong>'.$employee["name"].'</strong> has been updated in the database.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    
  <form class="w-50 mx-auto" method="POST" action=<?= isset($_GET["id"]) ? "./library/employeeController.php?editEmployee_Form ": "./library/employeeController.php?addEmployee_Form" ?>>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputName">Name</label>
              <input type="text" class="form-control" name="name" id="inputName" value=<?= isset($_GET["id"]) ? $employee["name"] : "" ?>>
          </div>
          <div class="form-group col-md-6">
              <label for="inputLastName">Last Name</label>
              <input type="text" class="form-control" name="lastName" id="inputLastName" value=<?= isset($_GET["id"]) ? $employee["lastName"] : "" ?>>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputEmail">Email Address</label>
              <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelpInline" value=<?= isset($_GET["id"]) ? $employee["email"] : "" ?>>
              <small id="emailHelpInline" class="text-muted">
                  We'll always share your email with anyone else.
                </small>
          </div>
          <div class="form-group col-md-6">
              <label for="inputGender">Gender</label>
              <select id="inputGender" name="gender" class="form-control">
                <option value="man" <?= isset($_GET["id"]) ? ($employee["gender"] =="man"? "selected" : "") :"" ?>>Man</option>
                <option value="woman" <?= isset($_GET["id"]) ? ($employee["gender"] =="woman"? "selected" : "") :"" ?>>Woman</option>
                </select>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" name="city" id="inputCity" value=<?= isset($_GET["id"]) ? $employee["city"] : "" ?>>
          </div>
          <div class="form-group col-md-6">
              <label for="inputStreetAddress">Street Address</label>
              <input type="text" class="form-control" name="streetAddress" id="inputStreetAddress" value=<?= isset($_GET["id"]) ? $employee["streetAddress"] : "" ?>>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputState">State</label>
              <input type="text" class="form-control" name="state" id="inputState" value=<?= isset($_GET["id"]) ? $employee["state"] : "" ?>>
          </div>
          <div class="form-group col-md-6">
              <label for="inputAge">Age</label>
              <input type="number" class="form-control" name="age" id="inputAge" value=<?= isset($_GET["id"]) ? $employee["age"] : "" ?>>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputPostalCode">Postal Code</label>
              <input type="number" class="form-control" name="postalCode" id="inputPostalCode" value=<?= isset($_GET["id"]) ? $employee["postalCode"] : "" ?>>
          </div>
          <div class="form-group col-md-6">
              <label for="inputPhoneNumber">Phone Number</label>
              <input type="text" class="form-control" name="phoneNumber" id="inputPhoneNumber" value=<?= isset($_GET["id"]) ? $employee["phoneNumber"] : "" ?>>
          </div>
      </div>
      <input hidden type="text" name="id" value=<?= isset($_GET["id"]) ? $employee["id"] : "" ?>>
      <button type="submit" class="btn btn-primary"><?= isset($_GET["id"]) ? "Edit" : "Create" ?></button>
      <a class="btn btn-secondary" href="./dashboard.php" role="button">Return</a>
  </form>
</main>

<?php
require(".././assets/html/footer.html");
?>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
  

</body>
</html>