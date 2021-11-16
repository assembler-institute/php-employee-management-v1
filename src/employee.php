<?php

# Verify if user is logged in 
require_once('./library/sessionHelper.php');

$logged = verifyLogin();
if (!$logged) {
    header('Location: ../index.php');
    exit();
}


# Get employee profile by ID
$id = isset($_GET["employeeId"]) ? $_GET["employeeId"] : null;

if ($id === null) header("Location: ./dashboard.php");

require_once("./library/employeeManager.php");

$employee = getEmployee($_GET["employeeId"]);

if ($employee === "Employee not found") header('Location: ./dashboard.php?notfound');

$name = isset($employee["name"]) ? $employee["name"] : "";
$lastName = isset($employee["lastName"]) ? $employee["lastName"] : "";
$email = isset($employee["email"]) ? $employee["email"] : "";
$gender = isset($employee["gender"]) ? $employee["gender"] : "";
$age = isset($employee["age"]) ? $employee["age"] : "";
$address = isset($employee["streetAddress"]) ? $employee["streetAddress"] : "";
$city = isset($employee["city"]) ? $employee["city"] : "";
$state = isset($employee["state"]) ? $employee["state"] : "";
$postalCode = isset($employee["postalCode"]) ? $employee["postalCode"] : "";
$phoneNumber = isset($employee["phoneNumber"]) ? $employee["phoneNumber"] : "";


?>

<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require_once("../assets/html/head.html")
    ?>
    <title>Employee Data</title>
</head>

<body>
    <header>
        <?php
        require_once("../assets/html/header.php")
        ?>
    </header>
    <main class="container p-5">
        <form id="employeeDetailForm">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" placeholder="<?php echo $name ?>" name="name" value="<?php echo $name ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" placeholder="<?php echo $lastName ?>" name="lastName" value="<?php echo $lastName ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo $email ?>" name="email" value="<?php echo $email ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputGender">Gender</label>
                    <select id="inputGender" class="form-control" name="gender">
                        <option selected><?php echo $gender ?></option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAge">Age</label>
                    <input type="number" class="form-control" id="inputAge" name="age" value="<?php echo $age ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPhone">Phone Number</label>
                    <input type="text" class="form-control" id="inputPhone" name="phoneNumber" value="<?php echo $phoneNumber ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo $city ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Street Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="<?php echo $address ?>" name="streetAddress" value="<?php echo $address ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">State</label>
                    <input type="text" class="form-control" id="inputState" name="state" value="<?php echo $state ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">Zip Code</label>
                    <input type="text" class="form-control" id="inputZip" name="postalCode" value="<?php echo $postalCode ?>">
                </div>
            </div>



            <input type="submit" class="btn btn-primary" value="Submit" id="submitButton"></input>
            <input type="hidden" name="id" value="<?php echo $id ?>"></input>
            <button type="button" class="btn btn-secondary"><a href="dashboard.php" class="text-decoration-none btn-secondary">Return </a></button>

        </form>
    </main>
</body>

</html>