<!-- TODO Employee view -->
<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
require_once "./library/loginController.php";
revisar_si_existe_sesion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File System Explorer</title>

	<!-- Script del CDN de Jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

	<!-- Iconos traidos de Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />

	<link rel="stylesheet" href="../assets/css/main.css">
	<link rel="stylesheet" href="../assets/css/login.css">

	<!-- grid styles and functions -->
	<link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css" />
	<link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
	<script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>

</head>

<body class="d-flex min-vh-100 flex-column justify-content-between align-item-between d-inline-block m-0 p-0">
	<?php include "../assets/html/header.html"; ?>
	<main class="d-flex w-100 min-vh-50 justify-content-center align-item-center">
		<form action="./src/library/loginController.php" method="POST" class="d-flex flex-column gap-3 p-2">
			<div class="d-flex flex-row gap-3 p-2 newUserForm">
				<section class="d-flex flex-column gap-3 p-2" id="formColumnOne">
					<div class="w-100 d-flex flex-column justify-content-center pt-2 h-100">
						<h5>Name</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-users"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="name" type="text" placeholder="" value="">
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Email adress</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-envelope"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="emailAdress" type="text" placeholder="" value="">
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>city</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-city"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="city" type="text" placeholder="" value="">
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>State</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-flag-usa"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="State" type="text" placeholder="" value="">
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Postal Code</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-mail-bulk"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="PostalCode" type="text" placeholder="" value="">
						</div>
					</div>
				</section>
				<section class="d-flex flex-column gap-3 p-2" id="formColumnTwo">
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Last Name</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-hand-scissors"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="LastName" type="text" placeholder="" value="">
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Gender</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-venus-mars"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="gender" type="text" placeholder="" value="">
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Street: Adress</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-road"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="adress" type="text" placeholder="" value="">
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Age</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-baby-carriage"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="age" type="text" placeholder="" value="">
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>PhoneNumber</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="phoneNumber" type="text" placeholder="" value="">
						</div>
					</div>
				</section>
			</div>
			<div class="px-3">
				<button type="submit" name="submit" class="btn btn-primary border pt-3 pb-3 text-light">Submit</button>
				<a href="./dashboard.php">
					<button type="button" name="return" class="btn btn-light border pt-3 pb-3 text-dark">Return</button>
				</a>
			</div>
		</form>
	</main>
	<?php include "../assets/html/footer.html"; ?>
</body>

</html>