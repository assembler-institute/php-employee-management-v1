<?php

// Header
include "../assets/html/header.html";

// Session checker
require_once "./library/loginManager.php";
checkSession();

// Get all employees from the JSON as an associative array
require_once "./library/employeeManager.php";
$employees = getEmployees();

?>

<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light container-xl">
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

<!-- Main table with employees data -->
<main class="container-xl my-5">
  <table class="table table-striped table-bordered">
    <thead>
      <tr class="table-primary">
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Str No.</th>
        <th>City</th>
        <th>State</th>
        <th>Postal Code</th>
        <th>Phone Number</th>
        <th><button id="btn-add-employee"class="btn btn-primary w-100 text-center" href="#">Add Employee</button></th>
      </tr>
    </thead>
    <!-- Loop through all employees in the JSON and create a new row in the table body -->
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
          <td class="d-flex justify-content-between">
            <a href="./library/employeeController.php?v=view&id=<?= $employee["id"]?>" class="btn btn-outline-info"><i class="far fa-eye" data-viewId=<?= $employee["id"]?> ></i></a>
            <button data-update='<?= $employee["id"]?>' class="btn btn-outline-secondary"><i class="fas fa-user-edit"></i></button>
            <a data-delete = '<?= $employee["id"]?>' class="btn btn-outline-danger" href="#deleteModal" data-toggle="modal"><i class="far fa-trash-alt"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
   
<!-- Confirm delete Modal -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog modal-confirm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header flex-column">				
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button id="deleteBtnModal" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
			</div>
		</div>
	</div>
</div>

<!-- Footer -->
<?php
include "../assets/html/footer.html"
    ?>
