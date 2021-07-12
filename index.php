<!-- TODO Application entry point. Login view -->
<?php
require_once "./src/library/loginController.php";
$alert = revisar_si_existe_sesion();
$_SESSION["BASE_URL"] = getcwd();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Script del CDN de Jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/login.css">

	<!-- Iconos traidos de Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />

</head>

<body class="d-flex min-vh-100 flex-column justify-content-between align-item-between d-inline-block m-0 p-0 body_bg">

	<header class="bg-light m-0">
		<div class="d-flex flex-row justify-content-center align-items-center pt-2 pb-2  border-bottom">
			<h3 class="text-dark">
				Employee Management
			</h3>
		</div>
	</header>

	<main class="">
		<section class="d-flex flex-column gap-2 justify-content-center align-item-between h-100 w-100">
			<div class="logo__wrapper d-flex flex-row justify-content-center align-items-center w-100">
				<div class="logo__app">
					<img src="assets\images\Alfonso y Erick Logotipos.gif" alt="logo">
				</div>
			</div>
			<div class="d-flex flex-row gap-2 justify-content-center align-item-between h-100 w-100">
				<form action="./src/library/loginController.php" method="POST" class="d-flex flex-column gap-3 p-2">
					<div class="w-100 d-flex justify-content-center pt-2  h-100">
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-users"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="username" type="text" placeholder="Your username..." id="input__username--login" value="">
						</div>
					</div>
					<div class="w-100 d-flex justify-content-center pt-2 pb-2 h-100">
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-key"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="password" type="password" placeholder="Your password..." id="input__password--login" value="">
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-light border pt-3 pb-3 text-dark" id="bt__submit--login">Log in</button>

				</form>
				<form action="./src/library/loginController.php" method="POST" class=" flex-column gap-3 p-2" id="register_form">
					<div class="w-100 d-flex justify-content-center pt-2  h-100">
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-users"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="new_username" type="text" placeholder="New username..." id="input__new--username--login" value="">
						</div>
					</div>
					<div class="w-100 d-flex justify-content-center pt-2 pb-2 h-100">
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-key"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="new_password" type="password" placeholder="New password..." id="input__new--password--login" value="">
						</div>
					</div>
					<button type="submit" name="register_submit" class="btn btn-light border border-secondary pt-3 pb-3 text-dark" id="bt__new--submit--login">Register<span> &#128520;</span></button>
				</form>
			</div>
			<div class="text__password--forgot d-flex flex-row justify-content-center align-items-center">
				<p class="text-light pt-1 pb-2" id="new__user--text">New user, register now?</p>
			</div>
			<div class="d-flex flex-row justify-content-center  align-items-center advise__login ">
				<?= $alert
					? "<div class='d-flex flex-row justify-content-center align-items-center'>
								<div class='$alert[bg] p-2 p-2 border border-secondary d-flex flex-row justify-content-between align-items-center w-100 rounded-3'>
									<div class='$alert[type]'>
									$alert[texto]
									</div>
									<div class='emoticon__advise'>
									$alert[emoticon]
									</div>
								</div>
							</div>"
					: "<div class=''></div>" ?>
			</div>
		</section>
	</main>
	<?php include "./assets/html/footer.html"; ?>
	<script src="./assets/js/index.js"></script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		switchRegisterForm();
	</script>
</body>

</html>