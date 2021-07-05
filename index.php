<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Management</title>
    <link
      rel="stylesheet"
      href="./node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link href="./assets/css/login.css" rel="stylesheet" />
  </head>
  <body class="text-center">
    <form class="form-signin" action="./src/dashboard.php">
      <img
        class="mb-4"
        src="./node_modules/bootstrap-icons/icons/box-arrow-in-right.svg"
        alt=""
        width="72"
        height="72"
      />
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input
        type="email"
        id="inputEmail"
        class="form-control"
        placeholder="Email address"

        autofocus=""
      />
      <label for="inputPassword" class="sr-only">Password</label>
      <input
        type="password"
        id="inputPassword"
        class="form-control"
        placeholder="Password"

      />
      <button class="btn btn-lg btn-primary btn-block" type="submit">
        Sign in
      </button>
      <p class="mt-5 mb-3 text-muted">PHP Employee Management</p>
    </form>
  </body>
</html>
