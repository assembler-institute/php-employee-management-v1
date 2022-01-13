<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Page</title>

   <link rel="stylesheet" href="../assets/css/main.css">
   <link rel="stylesheet" href="../assets/css/employee.css">
      <!--CSS BOOTSTRAP-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!--CSS JSGrid-->
   <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
   <!--JS BOOTSTRAP-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
   <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
   <!--JS SQUERY-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <!--JS JSgrid-->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <script src="../assets/js/index.js" defer></script>
</head>
<body>
<?php
  require ("./../assets/html/header.html");


  if(isset($_GET["id"])){
    $idvalue = $_GET["id"];
    $newCollections = json_decode(file_get_contents('../resources/employees.json'), true);
    for ($i=0; $i < count($newCollections) ; $i++) {
      if ($newCollections[$i]['id'] == $idvalue){
        $name = $newCollections[$i]['name'];
        $lastName = $newCollections[$i]['lastName'];
        $email = $newCollections[$i]['email'];
        $gender = $newCollections[$i]['gender'];
        $age = $newCollections[$i]['age'];
        $streetA = $newCollections[$i]['streetAddress'];
        $city = $newCollections[$i]['city'];
        $state = $newCollections[$i]['state'];
        $postalCode = $newCollections[$i]['postalCode'];
        $phoneNum = $newCollections[$i]['phoneNumber'];
      }
    }
  };
  ?>
  <div class="container-employee">
    <?php
      if (isset($_GET["id"])){
        echo "<form class='row g-3 needs-validation' action='library/employeeController.php?form=$idvalue'method='POST' novalidate>";
      }
      else{
        echo "<form class='row g-3 needs-validation' action='library/employeeController.php?flag=1' method='POST' novalidate>";
      }
    ?>
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Name</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" <?php if (isset($name)){echo "value='$name'";} ?> placeholder="name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="validationCustom02" name="lastName" <?php if (isset($lastName)){echo "value='$lastName'";} ?> placeholder="last name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomEmail" class="form-label">Email Adress</label>
    <input type="text" class="form-control" id="validationCustomEmail" name="email"<?php if (isset($email)){echo "value='$email'";}?> placeholder = "email direction" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomGender" class="form-label">Gender</label>
    <select class="form-select" id="validationCustomGender" name="gender" required>
      <option <?php if(!isset($gender)) {echo "selected";} else {if($gender === ""){echo "selected";}} ?> disabled value="">Gender....</option>
        <option <?php if(isset($gender)){ if($gender == "man") {echo "selected";}}?>>man</option>
        <option <?php if(isset($gender)){ if($gender == "woman") {echo "selected";}}?>>woman</option>
        <option>Not Gender</option>
    </select>
    <div class="invalid-feedback">
      Please select a Gender.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom03" name="city" <?php if (isset($city)){echo "value='$city'";}?> placeholder = "city" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomSaddress" class="form-label">Street Address</label>
    <input type="text" class="form-control" id="validationCustomSaddress" name="streetAddress" <?php if(isset($streetA)){echo "value='$streetA'";}?> placeholder = "street address"required>
    <div class="invalid-feedback">
      Please provide a valid address.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomSaddress" class="form-label">State</label>
    <input type="text" class="form-control" id="validationCustomSaddress" name="state" <?php if(isset($state)){echo "value='$state'";}?> placeholder = "State"required>
    <div class="invalid-feedback">
      Please provide a valid State.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomAge" class="form-label">Age</label>
    <input type="text" class="form-control" id="validationCustomAge" name="age" <?php if(isset($age)){echo "value='$age'";}?> placeholder = "Age" required>
    <div class="invalid-feedback">
      Type an age.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom05" class="form-label">Postal Code</label>
    <input type="text" class="form-control" id="validationCustom05" name="postalCode" <?php if(isset($postalCode)){echo "value='$postalCode'";}?>" placeholder = "Postal Code" required>
    <div class="invalid-feedback">
      Please provide a valid Postal Code.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom06" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="validationCustom06" name="phoneNumber" <?php if(isset($phoneNum)){echo "value='$phoneNum'";}?> placeholder = "Phone number" required>
    <div class="invalid-feedback">
      Please provide a valid Phone Number.
    </div>
  </div>
  <div class="col-2">
    <button class="btn btn-primary" type="submit">Submit</button>
  </div>
  <div class="col-2">
    <button class="btn btn-secondary" type="submit">Return</button>
  </div>
</form>
</div>
<?php
  require ("./../assets/html/footer.html");
  
  ?>
</body>
</html>