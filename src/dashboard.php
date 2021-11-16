<?php
# Verify if user is logged in
require_once('./library/sessionHelper.php');
$logged = verifyLogin();
if (!$logged) {
  header('Location: ../index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <?php
  require_once("../assets/html/head.html")
  ?>

  <title>Employee dashboard</title>
</head>

<body>
  <header>
    <?php
    require_once("../assets/html/header.php")
    ?>
  </header>

  <main>
    <div id="jsGrid" class="mt-5 container"></div>
  </main>
  <?php

  $updateMsg = isset($_GET["updated"]) ? $_GET["updated"] : "";

  if ($updateMsg === "success") {
    echo "<div class='alert alert-success alert-dismissible fade show bottom-right' role='alert'>
                  <strong> Employee Updated Successfully!</strong>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
          </div>";
  }

  if (isset($_GET["notfound"])) {
    echo "<div class='alert alert-danger alert-dismissible fade show bottom-right' role='alert'>
                  <strong> Employee Not Found!</strong>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
          </div>";
  }

  ?>
</body>

</html>