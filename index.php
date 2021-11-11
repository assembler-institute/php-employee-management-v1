<!-- TODO Application entry point. Login view -->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Employee Management - Login Demo</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <!-- Custom styles for this template -->
  <link href="./assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <main class="form-signin">
    <form action="./modules/login.php" method="post">
      <img src="../../assets/img/assembler_icon.jfif" width="40" height="40" class="me-3" alt="Assembler School">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" data-bs-toggle="tooltip" data-bs-html="true" title="imassembler@assemblerschool.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" title="Assemb13r">
        <label for="floatingPassword">Password</label>
      </div>
      <?= ($error) ? "<div class='alert alert-$error[status]'  role='alert'> $error[message] </div>" : "" ?>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>


  <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>