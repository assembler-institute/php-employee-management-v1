<!-- TODO Application entry point. Login view -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Php-employee-management-v1</title>
  <link rel="stylesheet" href="./assets/css/login.css">
  <!--CSS BOOTSTRAP-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--CSS JSGRID-->
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <!--JS JSGRID-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js" defer></script>
  <!--JS BOOTSTRAP-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
  <!--JQUERY-->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
  <script src="./assets/js/index.js" defer></script>
</head>

<body>
  <div id="container-login">
  <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center" id="template-bg-3">
  
    <div class="card mb-6 bg-dark bg-gradient text-white">
      <div class="card-header text-center">
      <a class="logo" href="#">
      <img src="https://i2.wp.com/assemblerschool.com/wp-content/uploads/2020/11/LOGO-ORG.png?fit=479%2C131" alt="logo" height="150">
    </a>
      </div>
      <div class="card-body mt-3">
        <form name="login" action="./src/library/loginController.php" method="POST">
          <div class="input-group form-group mt-3">
            <input type="text" class="form-control text-center p-3" placeholder="Email address" name="email">
          </div>
          <div class="input-group form-group mt-3">
            <input type="password" class="form-control text-center p-3" placeholder="Password" name="pass">
          </div>
          <div class="text-center">
            <input type="submit" value="Sign in" class="btn btn-primary mt-3 w-100 p-2" name="login-btn">
          </div>
          <footer class="py-3 my-4 border-top">
  <div class="footer-block">
    <span class="text-center text-muted">© Assambler School Of Software Engineering 2020</span>
  </div>
</footer>
        </form>
        <?php if (!empty($loginResult)) { ?>
          <div class="text-danger"><?php echo $loginResult; ?></div>
        <?php } ?>
      </div>
    </div>
  </div>
  </div>
</body>

</html>