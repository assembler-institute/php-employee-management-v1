<!-- TODO Employee view -->
<?php
require_once('./library/sessionHelper.php');
checkExpiredSession();
require_once "./library/loginController.php";
revisar_si_existe_sesion();

require_once "./library/employeeController.php";
if (isset($_GET["id"])) {
  $clickedUserId = $_GET["id"];
  $foundEmployee = findUserToUpdate_on_data_base($clickedUserId);
}
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

	<!-- cdn de la libreria OWL, para hacer el carrousel -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="d-flex min-vh-100 flex-column justify-content-between align-item-between d-inline-block m-0 p-0">
	<?php include "../assets/html/header.html"; ?>
	<section class="container">
		<div class="carrousel_fotos" id="carrousel_fotos">
			<div class="owl-carousel owl-theme" id="owl-carousel">
			</div>
		</div>
	</section>

	<main class="d-flex w-100 min-vh-50 justify-content-center align-item-center">
		<form action=<?php if (isset($_GET["id"])) {
    echo "./library/employeeController.php?id=$clickedUserId";
  } else {
    echo "./library/employeeController.php";
  } ?> method="POST" class="d-flex flex-column gap-3 p-2">
			<div class="d-flex flex-row gap-3 p-2 newUserForm">
				<section class="d-flex flex-column gap-3 p-2" id="formColumnOne">
					<div class="w-100 d-flex flex-column justify-content-center pt-2 h-100">
						<h5>Name</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-users"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="name" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["name"])
       ) {
         echo "";
       } else {
				 echo('"'.$foundEmployee["name"].'"');
       } ?>>
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Email adress</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-envelope"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="email" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["email"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["email"].'"');
       } ?>>
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>city</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-city"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="city" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["city"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["city"].'"');
       } ?>>
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>State</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-flag-usa"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="state" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["state"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["state"].'"');
       } ?>>
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Postal Code</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-mail-bulk"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="postalCode" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["postalCode"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["postalCode"].'"');
       } ?>>
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
							<input class="form-control form-control-dark w-100" name="LastName" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["lastName"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["lastName"].'"');
       } ?>>
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Gender</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-venus-mars"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="gender" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["gender"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["gender"].'"');
       } ?>>
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Street: Adress</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-road"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="streetAddress" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["streetAddress"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["streetAddress"].'"');
       } ?>>
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>Age</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-baby-carriage"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="age" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["age"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["age"].'"');
       } ?>>
						</div>
					</div>
					<div class="w-100 d-flex flex-column justify-content-center pt-2 pb-2 h-100">
						<h5>PhoneNumber</h5>
						<div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
							<div class="d-flex justify-content-center align-item-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<input class="form-control form-control-dark w-100" name="phoneNumber" type="text" placeholder="" value=<?php if (
         empty($foundEmployee["phoneNumber"])
       ) {
         echo "";
       } else {
				echo('"'.$foundEmployee["phoneNumber"].'"');
       } ?>>
						</div>
					</div>
				</section>
			</div>
			<div class="px-3">
				<button type="submit" name="submitEmployee" class="btn btn-primary border pt-3 pb-3 text-light">Submit</button>
				<a href="./dashboard.php">
					<button type="button" name="return" class="btn btn-light border pt-3 pb-3 text-dark">Return</button>
				</a>
			</div>
		</form>
	</main>
	<?php include "../assets/html/footer.html"; ?>
	<script src="../assets/js/index.js"></script>
	<script>
		carrousel_images();
	</script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>