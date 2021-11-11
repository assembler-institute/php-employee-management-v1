<?php
require_once("./src/library/sessionHelper.php");

//Check for session and error / info messages
$alert = checkSession();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>[PHP - Sessions] - Login Demo</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="./assets/css/login.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="./src/library/loginController.php" method="POST">
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
      <?= ($alert) ? "<div class='alert alert-$alert[type] role='alert'>$alert[text]</div>" : "" ?>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>

    </form>
  </main>

  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>