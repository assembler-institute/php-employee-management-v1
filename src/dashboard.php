<?php

require_once("../config/constants.php");
require_once("./library/sessionHelper.php");

startSession();

if (!getSessionValue("user")) {
	header("Location: ../index.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Manager - Dashboard</title>
	<link type="text/css" rel="stylesheet" href="<?= BASE_URL . "/node_modules/bootstrap/dist/css/bootstrap.min.css" ?>" />
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
	<link type="text/css" rel="stylesheet" href="<?= BASE_URL . "/assets/css/jsGrid.css" ?>" />
	<script src="<?= BASE_URL . "/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ?>" type="module"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
	<script src="<?= BASE_URL . "/assets/js/jsGrid.js" ?>" type="module"></script>
</head>

<body class="min-vh-100">
	<?php include(ASSETS . "/html/header.html"); ?>
	<main class="position-relative container-sm p-5 w-100">
		<?php include("./notifications.php"); ?>
		<h1 class="display-6 m-0">Dashboard</h1>
		<hr />
		<div id="jsGrid"></div>
	</main>
	<?php include(ASSETS . "/html/footer.html"); ?>
</body>

</html>