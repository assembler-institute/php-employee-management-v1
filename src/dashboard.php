<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<?php include '../assets/head.html';
	require_once("./library/sessionHelper.php");
	session_start();
	timeExpires();
?>

<body>
	<div class="d-flex justify-content-between">
		<h1>dashboard</h1>
		<a href="./library/loginController.php?logout"><button class="btn">log out</button></a>
	</div>
	<a href="./employee.php">Go to employee</a>
	<p>Hola: <?php 
			if(isset($_SESSION["name"])) {
				echo $_SESSION["name"];
			}
	?> </p>
	<div id="jsGrid"></div>
</body>
</html>