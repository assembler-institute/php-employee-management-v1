<?php

require_once("../config/constants.php");
require_once(LIBRARY . "/sessionHelper.php");

startSession();
checkSession();

if (!getSessionValue("user")) {
	header("Location: " . BASE_URL);
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
	<link type="text/css" rel="stylesheet" href="<?= BASE_URL . "/node_modules/jsgrid/dist/jsgrid.min.css" ?>" />
	<link type="text/css" rel="stylesheet" href="<?= BASE_URL . "/node_modules/jsgrid/dist/jsgrid-theme.min.css" ?>" />
	<link type="text/css" rel="stylesheet" href="<?= BASE_URL . "/node_modules/bootstrap/dist/css/bootstrap.min.css" ?>" />
	<link type="text/css" rel="stylesheet" href="<?= BASE_URL . "/assets/css/jsGrid.css" ?>" />
	<script src="<?= BASE_URL . "/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ?>" type="module"></script>
	<script src="<?= BASE_URL . "/node_modules/jquery/dist/jquery.min.js" ?>" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="<?= BASE_URL . "/node_modules/jsgrid/dist/jsgrid.min.js" ?>"></script>
	<script src="<?= BASE_URL . "/assets/js/grid.js" ?>" type="module"></script>
	<script src="<?= BASE_URL . "/assets/js/header.js" ?>" type="module"></script>
</head>

<body class="min-vh-100 position-relative pb-5">
	<?php include(ASSETS . "/html/header.html"); ?>
	<main class="position-relative container-sm p-5 w-100">
		<?php include(SRC . "/notifications.php"); ?>
		<h1 class="display-6 m-0">Dashboard</h1>
		<hr />
		<div id="jsGrid"></div>
	</main>
	<?php include(ASSETS . "/html/footer.html"); ?>
</body>

</html>