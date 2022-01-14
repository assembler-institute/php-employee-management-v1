<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
        require "../assets/html/header.html";
    ?>
    <?php
      require "./library/employeeController.php";
      
    ?>
    <?php echo $_POST['name']; ?>
<div class="container-xl grid-2">
<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Name</label>
    <input type="text" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" value="" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Email adress</label>
    <input type="text" class="form-control" id="validationCustom02" value="" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Gender</label>
    <select class="form-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">Male</option>
    <option value="2">Female</option>
    <option value="3">Other</option>
  </select>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom03" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Street Adress</label>
    <input type="text" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">State</label>
    <input type="text" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Age</label>
    <input type="text" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Postal Code</label>
    <input type="text" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
    <button type="button" class="btn btn-secondary">Return</button>
  </div>
</form>
</div>
    <?php
        require "../assets/html/footer.html"
    ?>
</body>
</html>