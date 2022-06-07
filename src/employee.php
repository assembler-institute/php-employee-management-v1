<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require('./library/employeeManager.php');

    $db = getEmployee($id);

    $name = $db['name'];
    $lastName = $db['lastName'];
    $email = $db['email'];
    $age = $db['age'];
    $gender = $db['gender'];
    $streetAddress = $db['streetAddress'];
    $city = $db['city'];
    $state = $db['state'];
    $postalCode = $db['postalCode'];
    $phoneNumber = $db['phoneNumber'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../src/library/employeeController.php" method="POST" enctype="multipart/form-data">
        <!-- dynamic id here -->
        <input type="hidden" name="id" id="" value="<?= $id ?>" placeholder="">
        <input type="text" name="name" id="name" value="<?= $name ?>" placeholder="name">
        <input type="text" name="lastName" id="lastName" value="<?= $lastName ?>" placeholder="Last Name">
        <input type="email" name="email" id="email" value="<?= $email ?>" placeholder="email">
        <input type="text" name="gender" id="gender" value="<?= $gender ?>" placeholder="gender">
        <input type="text" name="city" id="city" value="<?= $city ?>" placeholder="city">
        <input type="text" name="streetAddress" id="streetAddress" value="<?= $streetAddress ?>" placeholder="Street Address">
        <input type="text" name="state" id="state" value="<?= $state ?>" placeholder="State">
        <input type="text" name="age" id="age" value="<?= $age ?>" placeholder="Age">
        <input type="text" name="postalCode" id="postalCode" value="<?= $postalCode ?>" placeholder="Postal Code">
        <input type="text" name="phoneNumber" id="phoneNumber" value="<?= $phoneNumber ?>" placeholder="Phone Number">
        <input type="submit" value="change" id="updateEmployeeButton">
    </form>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>