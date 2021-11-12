<?php
require_once("./library/sessionHelper.php");
startSession();

if (!getSessionValue("user")) {
	header("Location: ../index.php");
	exit();
}

$data = [];
$method = "POST";

if (isset($_GET["id"]) && $_GET["id"]) {
	$id = $_GET["id"];
	$employeesCollection = json_decode(file_get_contents("../resources/employees.json"), true);

	foreach ($employeesCollection as $employee) {
		if ($employee["id"] == $id) {
			$data = $employee;
			$method = "PUT";
			break;
		}
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
	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
	<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
	<script src="../assets/js/employee.js" type="module"></script>

</head>

<body>
	<?php include("./notifications.php"); ?>
	<?php include("../assets/html/header.html"); ?>
	<main class="container-sm">
		<form id="employee-form" class="d-flex justify-content-center" method="<?= $method ?>" action="./library/employeeController.php">
			<div class="row w-75 p-5">
				<div class="col-12">
					<h1 class="display-6">Employee</h1>
					<hr />
				</div>
				<div class="col-md-6 mb-3">
					<label for="name" class="form-label">First name</label>
					<input type="text" class="form-control" name="name" id="name" required value="<?= (isset($data["name"])) ? $data["name"] : null ?>" />
				</div>
				<div class="col-md-6 mb-3">
					<label for="lastName" class="form-label">Last name</label>
					<input type="text" class="form-control" name="lastName" id="lastName" required value="<?= (isset($data["lastName"])) ? $data["lastName"] : null ?>" />
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
					<input type="number" min="0" class="form-control" name="age" id="age" value="<?= (isset($data["age"])) ? $data["age"] : null ?>" />
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
					<label for="address" class="form-label">Address</label>
					<input type="text" class="form-control" name="address" id="address" value="<?= (isset($data["address"])) ? $data["address"] : null ?>" />
				</div>
				<div class="col-md-3 mb-3">
					<label for="city" class="form-label">City</label>
					<input type="text" class="form-control" name="city" id="city" value="<?= (isset($data["city"])) ? $data["city"] : null ?>" />
				</div>
				<div class="col-md-3 mb-3">
					<label for="state" class="form-label">State</label>
					<select class="form-select" id="state" name="state" value="<?= (isset($data["state"])) ? $data["state"] : null ?>">
						<option selected disabled value="none">Not specified</option>
						<option value="CA">California</option>
						<option value="NY">New York</option>
					</select>
				</div>
				<div class="col-md-3 mb-3">
					<label for="postalCode" class="form-label">Postal code</label>
					<input type="text" class="form-control" name="postalCode" id="postalCode" value="<?= (isset($data["postalCode"])) ? $data["postalCode"] : null ?>" />
				</div>
				<div class="col-12 d-flex justify-content-center">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</div>
		</form>
	</main>
	<?php include("../assets/html/footer.html"); ?>
</body>

</html>