<!-- TODO Employee view -->
<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:./../index.php?notlogged=1");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once("./../assets/html/header.html");
        include_once("./library/employeeManager.php");
    ?>
    <title>Employee</title>
</head>

<body>
            <?php
            $employeeObj =getEmployee($_GET['userId']);
            ?>

    <section class="m-0 vh-100 row justify-content-center align-items-center">
        <form class="col-6 p-5 text-center bg-light">
            <h2>Employee Name</h2>
            <div class="row">
                <div class="col ">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value=<?php echo $employeeObj['name'];?>>
                    <label for="inputEmail1" class="form-label">Email address</label>
                    <input type="email" name="usermail" class="form-control" id="inputEmail" value=<?php echo $employeeObj['email'];?>>
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity" name="city" value=<?php echo $employeeObj['city'];?>>
                    <label for="inputState" class="form-label">State</label>
                    <input type="text" class="form-control" id="inputState" name="state" value=<?php echo $employeeObj['state'];?>>
                    <label for="inputPostalCode" class="form-label">PostalCode</label>
                    <input type="text" class="form-control" id="inputPostalCode" name="postalCode" value=<?php echo $employeeObj['postalCode'];?>>
                </div>
                <div class="col">
                    <label for="inputLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" name="lastName" value=<?php echo $employeeObj['lastName'];?>>
                    <label for="inputGender" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="inputGender" name="gender" value=<?php echo $employeeObj['gender'];?>>
                    <label for="inputStreetAddress" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="inputStreetAddress" name="streetAddress" value=<?php echo $employeeObj['streetAddress'];?>>
                    <label for="inputAge" class="form-label">Age</label>
                    <input type="text" class="form-control" id="inputAge" name="age" value=<?php echo $employeeObj['age'];?>>
                    <label for="inputPhoneNumber" class="form-label">PhoneNumber</label>
                    <input type="tel" class="form-control" id="inputPhoneNumber" name="phoneNumber" value=<?php echo $employeeObj['phoneNumber'];?>>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <button class="btn btn-warning col-4">Save</button>
                <button class="btn btn-warning col-4">Cancel</button>
            </div>
        </form>
    </section>

</body>

</html>