<?php
include "../assets/html/header.html";
require_once "./library/employeeManager.php";
$employees = getEmployees();
require_once "./library/loginManager.php";
checkSession();
    ?>
<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="../assets/img/logo.jpg" alt="" width="25">
    </a>
    <a class="navbar-brand" href="#">Employees Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Employee</a>
        </li>
      </ul>
    </div>
    <a class="link-primary" href="./library/loginController.php?logout=1">Log out</a>
  </div>
</nav>

<!-- Read JSON file, convert it into PHP array and then iterate over the array in order to create a table-->
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Str No.</th>
        <th>City</th>
        <th>State</th>
        <th>Postal Code</th>
        <th>Phone Number</th>
        <th><a id="btn-add-employee"class="btn btn-success" href="#"><i class="fas fa-plus"></i></a></th>
      </tr>
    </thead>
    <tbody id="employees-table">
      <?php foreach ($employees as $employee) : ?>
        <tr>
          <td><?= $employee["name"] ?></td>
          <td><?= $employee["email"] ?></td>
          <td><?= $employee["age"] ?></td>
          <td><?= $employee["streetAddress"] ?></td>
          <td><?= $employee["city"] ?></td>
          <td><?= $employee["state"] ?></td>
          <td><?= $employee["postalCode"] ?></td>
          <td><?= $employee["phoneNumber"] ?></td>
          <td class="d-flex">
            <a href="./library/employeeController.php?v=view&id=<?= $employee["id"]?>" class="btn btn-sm btn-outline-info"><i class="far fa-eye" data-viewId=<?= $employee["id"]?> ></i></a>
            <button data-update='<?= $employee["id"]?>' class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-edit"></i></button>
            <button data-delete = '<?= $employee["id"]?>' class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
include "../assets/html/footer.html"
    ?>
