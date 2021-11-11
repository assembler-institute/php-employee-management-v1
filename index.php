

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Employee Management - Login</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <!-- Custom styles for this template -->
  <link href="./assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <main class="form-signin">
  <?= ($error) ? "<div class='alert alert-$error[status]'  role='alert'> $error[message] </div>" : "" ?>

    <form action="./modules/login.php" method="post">
      <img src="./assets/img/assembler.png" class="me-3 img-form" alt="Assembler School">
      <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email address" data-bs-toggle="tooltip" data-bs-html="true" title="imassembler@assemblerschool.com">
      </div>
      <div class="form-floating">
        <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" title="Assemb13r">
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; Assembler School 2021</p>
    </form>
  </main>


  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>