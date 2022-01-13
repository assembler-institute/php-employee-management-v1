<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once("./library/sessionHelper.php");
        require_once("./../assets/html/header.html");
    ?>
    <title>Employee</title>
    <!-- my scripts -->
    <script src="./../assets/js/employee.js" defer></script>

</head>

<body class="gradient">

    <section class="row justify-content-center">
        <form id="employeeForm" class="col-8 bg-light" action="./library/employeeController.php?update" method="POST">
            <h2 id="nameTitle"> </h2>
            <!-- hidden input that collects the value of the id of the object selected in the dashboard -->
            <input id="userId" type="hidden" name="id" value="<?php  if( isset ($_GET["userId"])) {   echo $_GET["userId"];      }else{    echo " ";    }?>">
            <div class="row">
                <div class="col ">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" required>
                    <label for="inputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
                    <label for="inputCity" class="form-label" >City</label>
                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="City">
                    <label for="inputState" class="form-label">State</label>
                    <input type="text" class="form-control" id="inputState" name="state" placeholder="State">
                    <label for="inputPostalCode" class="form-label">PostalCode</label>
                    <input type="text" class="form-control" id="inputPostalCode" name="postalCode" placeholder="Postal code">
                </div>
                <div class="col">
                    <label for="inputLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="Last name" required>
                    <label for="inputGender" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="inputGender" name="gender" placeholder="Gender">
                    <label for="inputStreetAddress" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="inputStreetAddress" name="streetAddress" placeholder="Street Adress">
                    <label for="inputAge" class="form-label">Age</label>
                    <input type="number" class="form-control" id="inputAge" name="age" placeholder="Age" require>
                    <label for="inputPhoneNumber" class="form-label">PhoneNumber</label>
                    <input type="tel" class="form-control" id="inputPhoneNumber" name="phoneNumber" placeholder="Phone number" required>
                </div>
            </div>
            <div class="row justify-content-center align-items-center sectionBtn">
                <button id="saveBtn" type="submit" class="btn btn-warning col-4" name="submit">Save</button>
                <button  id="cancelBtn"  class="btn btn-warning col-4" name="candelbtn">Cancel</button>
            </div>
        </form>
    </section>

</body>

</html>