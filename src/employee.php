<!-- TODO Employee view -->
<?php
session_start();
require_once('./library/sessionHelper.php');
checkExpiredSession();
if(!isset($_SESSION)){
  header("Location : ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management</title>

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link href="../assets/css/main.css" rel="stylesheet" />
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
  <header class="bg-light mb-4">
    <?php 
      require ("../assets/html/header.html");
    ?>
  </header>
  <main class="container-xl mx-auto pb-90">
    <form action="./library/employeeController.php?update=true" method="POST" class="container-md">
    <?php 
      if(isset($_GET['okUpdate'])){
        if($_GET['okUpdate'] == true){
          echo "<div class='alert alert-success text-center'> <h5>Employee Successfully Saved!</h5></div>";
        }
      } 
    ?>
      <h3>Employee: </h3>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="inputName">Name</label>
            <input name="name" type="text" class="form-control" id="inputName" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["name"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['name'];
            }
            ?>">
          </div>
          <div class="form-group">
            <label for="inputMail">Email adrress</label>
            <input name="email" type="email" class="form-control" id="inputMail" aria-describedby="emailHelp" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["email"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['email'];
            }
            ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="inputCity">City</label>
            <input name="city" type="text" class="form-control" id="inputCity" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["city"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['city'];
            }
            ?>">
          </div>
          <div class="form-group">
            <label for="inputState">State</label>
            <input name="state" type="text" class="form-control" id="inputState" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["state"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['state'];
            }
            ?>">
          </div>
          <div class="form-group">
            <label for="inputPostalCode">Postal Code</label>
            <input name="postalCode" type="number" class="form-control" id="inputPostalCode" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["postalCode"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['postalCode'];
            }
            ?>">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="inputLastName">Last Name</label>
            <input name="lastName" type="text" class="form-control" id="inputLastName" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["lastName"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['lastName'];
            }
            ?>">
          </div>
          <div class="form-group">
          <label for="inputGender">Example select</label>
          <select class="form-control" id="inputGender" name="gender[]">

            <option value="default" <?php 
              if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
                if($_SESSION["employeeUpdate"]["gender"]=="default"){ 
                  echo "selected='selected'";
                } 
              } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
                if($_SESSION["newEmployee"]["gender"]=="default"){ 
                  echo "selected='selected'";
                } 
              } 
              //elseif(!isset($_SESSION["employeeUpdate"])) {}

                ?>>
            </option>

            <option value="man" <?php 
              if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
                if($_SESSION["employeeUpdate"]["gender"]=="man"){ 
                  echo "selected='selected'";
                }
              } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
                if($_SESSION["newEmployee"]["gender"]=="man"){ 
                  echo "selected='selected'";
                }
              } 
            ?>>man</option>

            <option value="woman" <?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              if($_SESSION["employeeUpdate"]["gender"]=="woman"){ 
              echo "selected='selected'";}
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              if($_SESSION["newEmployee"]["gender"]=="woman"){ 
                echo "selected='selected'";
              }
            } 
            
            ?>>woman</option>

            <option value="other" <?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              if($_SESSION["employeeUpdate"]["gender"]=="other"){ 
                echo "selected='selected'";}
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              if($_SESSION["newEmployee"]["gender"]=="other"){ 
                echo "selected='selected'";
              }
            } 
            ?>>other</option>
          </select>
          </div>
          <div class="form-group">
            <label for="inputStreetAddress">Street Adrress</label>
            <input name="streetAddress" type="text" class="form-control" id="inputStreetAddress" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["streetAddress"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['streetAddress'];
            }
            ?>">
          </div>
          <div class="form-group">
            <label for="inputAge">Age</label>
            <input name="age" type="number" class="form-control" id="inputAge" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["age"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['age'];
            }
            ?>">
          </div>
          <div class="form-group">
            <label for="inputPhoneNumber">Phone Number</label>
            <input name="phoneNumber" type="number" class="form-control" id="inputPhoneNumber" value="<?php 
            if(isset($_SESSION["employeeUpdate"]) && !empty($_SESSION["employeeUpdate"])){
              echo $_SESSION["employeeUpdate"]["phoneNumber"];
            } elseif(isset($_SESSION['newEmployee']) && !empty($_SESSION['newEmployee'])) {
              echo $_SESSION['newEmployee']['phoneNumber'];
            }
            ?>">
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