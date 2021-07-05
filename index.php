<!-- TODO Application entry point. Login view -->
<?php
require_once "./src/library/loginController.php";
$alert = revisar_si_existe_sesion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/login.css">

	<!-- Iconos traidos de Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />

</head>

<body class="container-fluid min-vh-100 d-inline-block bg-light m-0 p-0">

	<header class="bg-white m-0">
		<div class="d-flex flex-row justify-content-center align-items-center pt-2 pb-2 mb-3 border-bottom">
			<h3>
				Employee Management
			</h3>
		</div>
	</header>

	<main class="container-fluid">
		<section class="container-sm w-25 main__container">
			<form action="./src/library/loginController.php" method="POST" class="d-flex flex-column gap-3">
				<!-- <div class="logo__wrapper d-flex flex-row justify-content-center align-items-center">
					<div class="logo__app">
						<img src="../../../doc/img/JonathanAndErick_logo.png" alt="logo">
					</div>
				</div> -->
				<div class="w-100 d-flex justify-content-center pt-2 pb-2 h-100">
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
				<button type="submit" name="submit" class="btn btn-dark border border-secondary pt-3 pb-3" id="bt__submit--login">Log in</button>
				<div class="text__password--forgot d-flex flex-row justify-content-start align-items-center">
					<p class="text-primary">Forgot your password?</p>
				</div>
				<?= $alert
      ? "<div class='d-flex flex-row justify-content-between align-items-center advise__login'>
						<div class='$alert[bg] p-2 p-2 border border-secondary d-flex flex-row justify-content-between align-items-center w-100 rounded-3'>
							<div class='$alert[type]'>
							$alert[texto]
							</div>
							<div class='emoticon__advise'>
							$alert[emoticon]
							</div>
						</div>
					</div>"
      : "<div class='advise__login'></div>" ?>
			</form>
		</section>
	</main>
	<?php include "./assets/html/footer.html"; ?>
	<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>