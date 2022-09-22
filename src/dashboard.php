<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php 
  session_start();
  require_once('library/sessionhelper.php');
  userConnected();
  startTimer();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <script src="assets/js/index.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../assets/css/main.css" >
    <link rel="stylesheet" href="../assets/css/dashboard.css" >
    <script src="https://kit.fontawesome.com/fe24ce668c.js" crossorigin="anonymous" defer></script>
    <script src="../assets/js/dashboard.js" defer></script>
  </head>
  <body>
    <header>
      <?php require_once('../assets/html/header.html') ?>
    </header>
    <main>
      <table class="table mt-5">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Street No.</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
            <th>Phone Number</th>
            <th>Open</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="tbody">
          
        </tbody>
      </table>

      <div id="alertTimer"></div>
      
      <div class="add-button-box">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add employee</button>
      </div>

      <!-- MODAL ADDING NEW EMPLOYEE -->
      <div class="modal fade" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new employee</h5>
              <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="createForm">
                <div class="row">
                  <div class="col-6">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="col-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                  </div>
                  <div class="col-6">
                    <label for="gender" class="form-label">Gender</label>
                    <div>
                    <select name="gender" id="gender" required>
                      <option value="man">Man</option>
                      <option value="woman">Woman</option>
                      <option value="other">Other</option>
                    </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                  </div>

                  <div class="col-6">
                    <label for="address" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                  </div>

                  <div class="col-6">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input type="number" class="form-control" id="postalCode" name="postalCode" required>
                  </div>

                  <div class="col-6">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                  </div>
                </div>

                <div class="modal-footer mt-4 btn-box">
                  <input id="submit" name="create" value="Save changes" type="submit" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    
    <footer>
      <?php require_once('../assets/html/footer.html') ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>