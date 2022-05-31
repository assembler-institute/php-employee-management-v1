<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <link rel="icon" href="./favicon.svg">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <script type="module" src="../assets/js/index.js" defer></script>
  <script type="module" src="../assets/js/gallery.js" defer></script>
</head>

<?php

session_start();

require_once("./library/sessionHelper.php");

checkSession(); // We check if the user has active login
checkSessionExpired(); // We check if the user session is still active

require_once("../assets/html/header.html");

?>

<div class="d-flex flex-column justify-content-center align-items-center">

  <?php

  if (isset($_GET['info']) && $_GET['info'] == "success") {
    echo "
      <div class='align-items-center text-white bg-primary border-0 w-25 my-5' id='toast'>
        <div class='d-flex'>
          <div class='toast-body'>
            Employee successfully updated!
          </div>
        </div>
      </div>";
  }

  $jsonData = file_get_contents('../resources/employees.json');
  $usersData = json_decode($jsonData, true);

  $newEmployee = end($usersData);
  $nextId = $newEmployee["id"] + 1;

  if (isset($_GET['employee'])) {
    $currentEmployee = [];
    foreach ($usersData as $user) {
      if ($user["id"] == $_GET['employee']) {
        $currentEmployee = $user;
      }
    }

    if (isset($currentEmployee['avatar-field'])) {
      $seed = $currentEmployee['avatar-field'];
      echo "
      <figure>
        <img class='user-avatar' src='https://avatars.dicebear.com/api/bottts/$seed.svg' alt='User avatar'/>
        <figcaption class='text-center'>Current avatar</figcaption>
      </figure>";
    }
  }

  ?>

  <div id="avatarCarousel" class="h-25 gap-3">
    <p class="text-center">If you want to change your avatar, select one of the following and press Edit</p>
    <div id="avatarContainer" class="d-flex justify-content-center align-items-center">
      <img id="avatarOption1" alt="Avatar option 1" class='avatar-option' data-avatar>
      <img id="avatarOption2" alt="Avatar option 2" class='avatar-option' data-avatar>
      <img id="avatarOption3" alt="Avatar option 3" class='avatar-option' data-avatar>
      <img id="avatarOption4" alt="Avatar option 4" class='avatar-option' data-avatar>
      <img id="avatarOption5" alt="Avatar option 5" class='avatar-option' data-avatar>
    </div>
    <button id="refresh-button" class="refresh-button">Refresh avatars</button>
  </div>

  <form method="POST" action="./library/employeeController.php" class="employee-form">
    <div class="form__row">
      <input type="hidden" name="id" id="id" class="d-none" value=<?= isset($_GET['employee']) ? $currentEmployee["id"] : $nextId ?>>
      <input type="hidden" name="avatar-field" id="avatar-field" class="d-none">
      <div>
        <label for="name">Name</label>
        <input class="form__input" type="text" name="name" id="name" required value=<?= isset($_GET['employee']) ? $currentEmployee["name"] : "" ?>>
      </div>
      <div>
        <label for="last-name">Last Name</label>
        <input class="form__input" type="text" name="lastName" id="lastName" required value=<?= isset($_GET['employee']) ? $currentEmployee["lastName"] : "" ?>>
      </div>
    </div>
    <div class="form__row">
      <div>
        <label for="email-address">Email address</label>
        <input class="form__input" type="email" name="email" id="email" required value=<?= isset($_GET['employee']) ? $currentEmployee["email"] : "" ?>>
      </div>
      <div>
        <label for="gender">Gender</label>
        <select class="form__input" name="gender" id="gender">
          <option>Man</option>
          <option>Woman</option>
          <option>Other</option>
        </select>
      </div>
    </div>
    <div class="form__row">
      <div>
        <label for="city">City</label>
        <input class="form__input" type="text" name="city" id="city" required value=<?= isset($_GET['employee']) ? $currentEmployee["city"] : "" ?>>
      </div>
      <div>
        <label for="street-address">Street Address</label>
        <input class="form__input" type="number" name="streetAddress" id="streetAddress" required value=<?= isset($_GET['employee']) ? $currentEmployee["streetAddress"] : "" ?>>
      </div>
    </div>
    <div class="form__row">
      <div>
        <label for="state">State</label>
        <input class="form__input" type="text" name="state" id="state" required value=<?= isset($_GET['employee']) ? $currentEmployee["state"] : "" ?>>
      </div>
      <div>
        <label for="age">Age</label>
        <input class="form__input" type="number" name="age" id="age" required value=<?= isset($_GET['employee']) ? $currentEmployee["age"] : "" ?>>
      </div>
    </div>
    <div class="form__row">
      <div>
        <label for="postal-code">Postal Code</label>
        <input class="form__input" type="number" name="postalCode" id="postalCode" required value=<?= isset($_GET['employee']) ? $currentEmployee["postalCode"] : "" ?>>
      </div>
      <div>
        <label for="phone-number">Phone Number</label>
        <input class="form__input" type="number" name="phoneNumber" id="phoneNumber" required value=<?= isset($_GET['employee']) ? $currentEmployee["phoneNumber"] : "" ?>>
      </div>
    </div>
    <div class="btn-container">
      <button type="submit" class="btn-submit"><?= isset($_GET['employee']) ? "Edit" : "Submit" ?></button>
      <a href="./dashboard.php" class="btn-return">Return</a>
    </div>
</div>
</form>
</div>

</html>