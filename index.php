<?php
require_once("./src/library/sessionHelper.php");

startSession();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Manager</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./node_modules/jsgrid/dist/js/jsgrid.min.css">
	<link rel="stylesheet" href="./node_modules/jsgrid/dist/js/jsgrid-theme.min.css">
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
	<script src="./node_modules/jsgrid/dist/js/jsgrid.min.js" type="module"></script>
</head>

<body>
	<aside class="position-absolute top-0 end-0 m-3">
		<?php foreach (["success", "danger", "info"] as $type) : ?>
			<?php if ($messages = popSessionValue($type)) : ?>
				<?php foreach ($messages as $message) : ?>
					<div class="alert alert-<?= $type ?> alert-dismissible fade show my-1 mx-1" role="alert">
						<?= $message ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		<?php endforeach ?>
	</aside>
	<?php if (getSessionValue("user")) : ?>
		<?php include("./src/dashboard.php"); ?>
	<?php else : ?>
		<?php include("./assets/html/login.html"); ?>
	<?php endif ?>
</body>

</html>