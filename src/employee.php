<!-- TODO Employee view -->

<?php
require_once("../src/library/employeeManager.php");
require_once("../assets/html/header.html");
session_start();
var_dump($_GET['employeeId']);

if (isset($_GET['employeeId'])) {
    getEmployee($_GET['employeeId']);
};

?>
<div class="container">
    <form method="POST" action="../src/library/employeeController.php">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" id="firstName" name="data[name]" placeholder="Input Name" value="<?= $employeeName ? $employeeName : "" ?>" />
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="data[lastName]" placeholder="Input Last Name" />
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="data[email]" placeholder="Input Email" />
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="data[gender]">
                <option selected value="choose">Choose...</option>
                <option value="man">Male</option>
                <option value="woman">Female</option>
                <option value="other">Other</option>
            </select>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="data[city]" placeholder="Input City" />
                </div>

                <div class="form-group col-md-4">
                    <label for="street">Street Address</label>
                    <input type="text" class="form-control" id="street" name="data[streetAddress]" placeholder="Input City" />
                </div>

                <div class="form-group col-md-2">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="data[state]" placeholder="Input State" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" name="data[age]" id="age" placeholder="Input your age" />
                </div>

                <div class="form-group col-md-4">
                    <label for="zipCode">Postal Code</label>
                    <input type="text" class="form-control" name="data[postalCode]" id="zipCode" placeholder="Input Zipcode" />
                </div>

                <div class="form-group col-md-6">
                    <label for="inputZip">Phone Number</label>
                    <input type="text" class="form-control" name="data[phoneNumber]" id="phone" placeholder="Input Phone Number" />
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary">Return</button>
    </form>
</div>

<?php
require_once("../assets/html/footer.html");
?>