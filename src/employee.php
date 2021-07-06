<!-- TODO Employee view -->
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
    <form action="" class="container-md">
      <h3>Employee: </h3>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName">
          </div>
          <div class="form-group">
            <label for="inputMail">Email adrress</label>
            <input type="email" class="form-control" id="inputMail" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="inputState">
          </div>
          <div class="form-group">
            <label for="inputPostalCode">Postal Code</label>
            <input type="number" class="form-control" id="inputPostalCode">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="inputLastName">Last Name</label>
            <input type="text" class="form-control" id="inputLastName">
          </div>
          <div class="form-group">
          <label for="inputGender">Example select</label>
          <select class="form-control" id="inputGender">
            <option>man</option>
            <option>woman</option>
            <option>other</option>
          </select>
          </div>
          <div class="form-group">
            <label for="inputStreetAddress">Street Adrress</label>
            <input type="text" class="form-control" id="inputStreetAddress">
          </div>
          <div class="form-group">
            <label for="inputAge">Age</label>
            <input type="number" class="form-control" id="inputAge">
          </div>
          <div class="form-group">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="number" class="form-control" id="inputPhoneNumber">
          </div>
        </div>
      </div>
      <button type="btn" class="btn btn-secondary">Back</button>
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