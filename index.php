<!-- TODO Application entry point. Login view -->
<?php
session_start();
if(isset($_SESSION["email"])){
    header("Location: ./src/dashboard.php") ;
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
<body>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
				<h4 class="company_title">Your Company Logo</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Log In</h2>
					</div>
					<div class="row">
						<form control="" class="form-group" action="./src/library/loginController.php" method="POST">
							<div class="row">
								<div><?php
								 if(isset($_GET["error"])){
									echo "invalid user/pasword";
								 }
								?></div>
							</div>
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username">
							</div>
							<div class="row">
								<span class="fa fa-lock"></span>
								<input type="password" name="password" id="password" class="form__input" placeholder="Password">
							</div>
							<div class="row">
								<input type="submit" value="Submit" class="btn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>