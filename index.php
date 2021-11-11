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
		<?php header("Location: ./src/dashboard.php"); ?>
	<?php else : ?>
		<?php header("Location: ./src/login.php"); ?>
	<?php endif ?>
</body>

</html>