<!-- TODO Employee view -->
<?php 
    session_start();
    require_once('library/sessionHelper.php');
    userConnected();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="assets/js/index.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css" >
  </head>
  <body>
    <header>
      <?php require_once('../assets/html/header.html') ?>
    </header>
    <main>
        <div>
            <form>
              <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="col-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="lastName">
                </div>
              </div>
                
              <div class="row">
                <div class="col-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                </div>

                <div class="col-6">
                  <label for="gender" class="form-label">Gender</label>
                  <div>
                  <select name="gender" id="gender">
                    <option value="man">Man</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                  </div>
                  
                </div>
              </div>
    
              <div class="row">
                <div class="col-6">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" name="city">
                </div>

                <div class="col-6">
                  <label for="address" class="form-label">Street Address</label>
                  <input type="text" class="form-control" id="address" name="address">
                </div>
              </div>

              <div class="row">

                <div class="col-6">
                  <label for="state" class="form-label">State</label>
                  <input type="text" class="form-control" id="state" name="state">
                </div>

                <div class="col-6">

                  <label for="age" class="form-label">Age</label>
                  <input type="number" class="form-control" id="age" name="age">
                </div>
              </div>

              <div class="row">

                <div class="col-6">
                  <label for="postalCode" class="form-label">Postal Code</label>
                  <input type="number" class="form-control" id="postalCode" name="postalCode">
                </div>

                <div class="col-6">
                  <label for="phoneNumber" class="form-label">Phone Number</label>
                  <input type="number" class="form-control" id="phoneNumber" name="phoneNumber">
                </div>
              </div>

              
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary">Return</button>
              

              </form>
        </div>
    </main>
    <footer>
      <?php require_once('../assets/html/footer.html') ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>