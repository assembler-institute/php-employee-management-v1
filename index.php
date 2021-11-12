<?php
require_once("./src/library/loginManager.php");

session_start();

$redirect = $_SESSION['isRedirecting'];
$error = ( ($redirect && isset($redirect)) ? checkRedirection() : checkSession());
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Employee Management - Login</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap core CSS
poner el CDN -->

<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous"
	/>

  <link href="./assets/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <main class="form-signin">
  <?=($error) ? "<div class='alert alert-$error[status]'  role='alert'> $error[message] </div>" : "" ?>

    <form action="src/library/loginController.php" method="post">
      <img src="./assets/img/assembler.png" class="me-3 img-form" alt="Assembler School">
      <div class="mb-1">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email address" data-bs-toggle="tooltip" data-bs-html="true" title="imassembler@assemblerschool.com">
      </div>
      <div class="mb-1">
        <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" title="Assemb13r">
      </div>

      <button class="w-100 btn btn-md btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; Assembler School 2021</p>
    </form>
  </main>
</body>

</html>