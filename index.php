<!-- TODO Application entry point. Login view -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/login.css">
  <script src="./assets/js/index.js" defer></script>
  <title>Php-employee-management-v1</title>
</head>

<body>
  <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center" id="template-bg-3">
    <div class="card mb-5 p-5  bg-dark bg-gradient text-white col-md-4">
      <div class="card-header text-center">
        <h3>Login</h3>
      </div>
      <div class="card-body mt-3">
        <form name="login" action="" method="post">
          <div class="input-group form-group mt-3">
            <input type="text" class="form-control text-center p-3" placeholder="Username" name="username">
          </div>
          <div class="input-group form-group mt-3">
            <input type="password" class="form-control text-center p-3" placeholder="Password" name="password">
          </div>
          <div class="text-center">
            <input type="submit" value="Login" class="btn btn-primary mt-3 w-100 p-2" name="login-btn">
          </div>
        </form>
        <?php if (!empty($loginResult)) { ?>
          <div class="text-danger"><?php echo $loginResult; ?></div>
        <?php } ?>
      </div>
      <div class="card-footer p-3">
        <div class="d-flex justify-content-center">
          <div class="text-primary">If you are a registered user,
            login here.</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>