<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
	<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
</head>

<body class="d-flex flex-column justify-content-center align-items-center w-100">

	<main class="min-vh-100 container-sm d-flex flex-column justify-content-center align-items-center gap-3">
		<h1 class="text-center display-4">Employee Manager</h1>
		<div class="border py-3 px-5 rounded-2">
			<h2 class="text-center fs-4 fw-light p-0 mb-4">Login</h2>
			<form method="POST" action="./library/loginController.php?login">
				<input class="form-control form-control-lg mb-3 bg-light" type="text" name="username" id="username" placeholder="username" />
				<input class="form-control form-control-lg mb-3 bg-light" type="password" name="password" id="password" placeholder="password" />
				<div class="d-flex justify-content-center gap-3">
					<button class="btn btn-primary" style="width: 8rem" type="submit">Login</button>
				</div>
			</form>
		</div>
	</main>


</body>

</html>