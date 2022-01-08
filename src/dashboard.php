<?php

include "../assets/html/header.html";

require "./library/employeeManager.php";
$employees = getEmployees();
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
  </div>
</nav>

<!-- Read JSON file, convert it into PHP array and then iterate over the array in order to create a table-->

<table class="table">
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
    </tr>
  </thead>
  <tbody>
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
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
include "../assets/html/footer.html"
    ?>