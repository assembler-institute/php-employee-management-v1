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

	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

	<!-- Iconos traidos de Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />

	<link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
	<?php include "../assets/html/header.html"; ?>
	<h1>Estoy en el Dashboard</h1>
</body>
</html>