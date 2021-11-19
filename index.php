<?php

require_once("./config/constants.php");
require_once(LIBRARY . "/sessionHelper.php");

startSession();
checkSession();

if (getSessionValue("user")) {
	$query = $_SERVER["QUERY_STRING"];

	switch ($query) {
		case "employee":
			header("Location: " . BASE_URL . "/src/employee.php");
			exit();
		case "dashboard":
			header("Location: " . BASE_URL . "/src/dashboard.php");
			exit();
		default:
			header("Location: " . BASE_URL . "/src/dashboard.php");
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
	<link rel="stylesheet" href="<?= BASE_URL . "/node_modules/bootstrap/dist/css/bootstrap.min.css" ?>" />
	<script src="<?= BASE_URL . "/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ?>" type="module"></script>
</head>

<body>
	<?php include(SRC . "/notifications.php"); ?>
	<main class="min-vh-100 container-sm d-flex flex-column justify-content-center align-items-center gap-3">
		<h1 class="text-center display-4">Employee Manager</h1>
		<div class="border py-3 px-5 rounded-2 bg-light">
			<h2 class="text-center fs-4 fw-light p-0 mb-4">Login</h2>
			<form method="POST" action="<?= BASE_URL . "/src/library/loginController.php?login" ?>">
				<input class="form-control form-control-lg mb-3" type="text" name="username" id="username" placeholder="username" />
				<input class="form-control form-control-lg mb-3" type="password" name="password" id="password" placeholder="password" />
				<div class="d-flex justify-content-center gap-3">
					<button class="btn btn-primary" style="width: 8rem" type="submit">Login</button>
				</div>
			</form>
		</div>
	</main>
</body>

</html>