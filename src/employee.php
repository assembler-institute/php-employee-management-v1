<?php

function getEmployee($id)
{
	$employeesCollection = json_decode(file_get_contents("../resources/employees.json"), true);

	foreach ($employeesCollection as $employee) {
		if ($employee["id"] == $id) {
			return $employee;
		}
	}

	return null;
}

require_once("./library/sessionHelper.php");
startSession();

if (!getSessionValue("user")) {
	header("Location: ../index.php");
	exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id) {
	$data = getEmployee($id);

	if ($data === null) {
		setSessionValue("danger", ["Employee #$id does not exist"]);
		header("Location: ./dashboard.php");
		exit();
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Manager - Form</title>
	<link type="text/css" rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
	<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
	<script src="../assets/js/employee.js" type="module"></script>
</head>

<body class="min-vh-100">
	<?php include("../assets/html/header.html"); ?>
	<main class="container-sm position-relative p-5 w-75">
		<?php include("./notifications.php"); ?>
		<div class="d-flex justify-content-between align-items-end">
			<h1 class="display-6 m-0">Employee</h1>
			<span class="fw-light text-secondary"><?php echo ($id) ? "Employee #$id" : "New employee" ?></span>
		</div>
		<hr />
		<form id="employee-form" class="d-flex justify-content-center">
			<?php if ($id) : ?>
				<input type="hidden" name="id" value="<?= $id ?>" />
			<?php endif ?>
			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="name" class="form-label">First name</label>
					<input type="text" class="form-control" name="name" id="name" required value="<?= (isset($data["name"])) ? $data["name"] : null ?>" />
				</div>
				<div class="col-md-6 mb-3">
					<label for="lastName" class="form-label">Last name</label>
					<input type="text" class="form-control" name="lastName" id="lastName" value="<?= (isset($data["lastName"])) ? $data["lastName"] : null ?>" />
				</div>
				<div class="col-md-6 mb-3">
					<label for="gender" class="form-label">Gender</label>
					<select class="form-select" id="gender" name="gender" value="<?= (isset($data["gender"])) ? $data["gender"] : null ?>">
						<option selected value="none">Not specified</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label for="age" class="form-label">Age</label>
					<input type="number" min="0" class="form-control" name="age" id="age" required value="<?= (isset($data["age"])) ? $data["age"] : null ?>" />
				</div>
				<div class="col-12 mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" name="email" id="email" required value="<?= (isset($data["email"])) ? $data["email"] : null ?>" />
				</div>
				<div class="col-12 mb-3">
					<label for="phoneNumber" class="form-label">Phone number</label>
					<input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" required value="<?= (isset($data["phoneNumber"])) ? $data["phoneNumber"] : null ?>" />
				</div>
				<div class="col-md-3 mb-3">
					<label for="streetAddress" class="form-label">Address</label>
					<input type="text" class="form-control" name="streetAddress" id="streetAddress" required value="<?= (isset($data["streetAddress"])) ? $data["streetAddress"] : null ?>" />
				</div>
				<div class="col-md-3 mb-3">
					<label for="city" class="form-label">City</label>
					<input type="text" class="form-control" name="city" id="city" required value="<?= (isset($data["city"])) ? $data["city"] : null ?>" />
				</div>
				<div class="col-md-3 mb-3">
					<label for="state" class="form-label">State</label>
					<select class="form-select" id="state" name="state" required value="<?= (isset($data["state"])) ? $data["state"] : null ?>">
						<option selected disabled value="none">Not specified</option>
						<option value="CA">California</option>
						<option value="NY">New York</option>
					</select>
				</div>
				<div class="col-md-3 mb-3">
					<label for="postalCode" class="form-label">Postal code</label>
					<input type="text" class="form-control" name="postalCode" id="postalCode" required value="<?= (isset($data["postalCode"])) ? $data["postalCode"] : null ?>" />
				</div>
				<div class="col-12 d-flex justify-content-center gap-3">
					<button class="btn btn-primary" type="submit">Submit</button>
					<a class="btn btn-outline-primary" href="./dashboard.php">Go back</a>
				</div>
			</div>
		</form>

	</main>
	<?php include("../assets/html/footer.html"); ?>
</body>

</html>

<?php
