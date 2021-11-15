<?php

session_start();
if (isset($_SESSION["username"])) {
	header("Location: ./src/dashboard.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Employee Manager</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
	<div class="container">
		<div class="form-container sign-in-container">
			<form method="POST" action="" class="form-login" id="formlogin">
				<h1>Sign in</h1>
				<input type="email" id="email" placeholder="Email" autocomplete="off" />
				<input type="password" id="password" placeholder="Password" />
				<a href="#">Forgot your password?</a>
				<button id="signinBtn" class="button-signin">Sign In</button>
				<div id="login-error"></div>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Employee Manager</h1>
					<p>Enter your personal data and start managing your employees</p>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="./assets/js/login.js"></script>
</body>

</html>