<!-- TODO Application entry point. Login view -->
<?php
session_start();
if (isset($_SESSION["email"])) {
	header("Location: ./src/dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<link rel="stylesheet" href="./assets/css/login.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Login Page</title>
</head>

<body class="d-flex align-items-center justify-content-center">
	<!-- Main Content -->

	<div class="wrapper d-flex align-items-center justify-content-center">
		<div class="container">
			
				<div class="logo"> <img src="/php-employee-management-v1/assets/images/IFunny-Logo.png" alt=""> </div>
				<div class="text-center mt-4 name"> M.R. Smile & Co.</div>
				<form class="p-3 mt-3 form-group" action="./src/library/loginController.php" method="POST">
					<div class="error text-center"><?php
													if (isset($_GET["error"])) {
														echo "invalid user/password";
													}
													?></div>
					<div class="form-field d-flex align-items-center mt-2"> <span class="far fa-user"></span> <input type="text" name="username" id="username" class="form__input" placeholder="Username"> </div>
					<div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="password" class="form__input" placeholder="Password"> </div>
					<div class="row mt-3">
						<input type="submit" value="Submit" class="btn">
					</div>
				</form>

		</div>
	</div>

</body>

</html>