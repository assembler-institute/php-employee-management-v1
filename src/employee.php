<!-- TODO Employee view -->

<?php
require_once("../src/library/employeeManager.php");
require_once("../assets/html/header.html");
session_start();



if (isset($_GET['employeeId'])) {
    $data = getEmployee($_GET['employeeId']);

    $employeeName = $data['name'];
    isset($data['lastName']) &&  strlen($data['lastName']) > 1 ? $lastName = $data['lastName'] : $lastName = "";
    // $lastName = $data['lastName'];
    $email = $data['email'];
    isset($data['gender']) &&  strlen($data['gender']) > 1 ? $gender = $data['gender'] : $gender = "";
    // $gender = $data['gender'];
    $city = $data['city'];
    $streetAddress = $data['streetAddress'];
    $state = $data['state'];
    $age = $data['age'];
    $postalCode = $data['postalCode'];
    $phoneNumber = $data['phoneNumber'];
    $id = $data['id'];
}
?>
<div class="container">
    <form method="PATCH" action="../src/library/employeeController.php">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" id="firstName" name="data[name]" placeholder="Input Name" value="<?= isset($employeeName) ? $employeeName : "" ?>" required />
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="data[lastName]" placeholder="Input Last Name" value="<?= isset($lastName) &&  strlen($lastName) > 1 ? $lastName : "" ?>" required />
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="data[email]" placeholder="Input Email" value="<?= isset($email) ? $email : "" ?>" required />
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="data[gender]" value="<?= isset($gender) ? $gender : "" ?>" required>
                <option value="">Choose...</option>
                <option value="man">Male</option>
                <option value="woman">Female</option>
                <option value="other">Other</option>
            </select>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="data[city]" placeholder="Input City" value="<?= isset($city) ? $city : "" ?>" required />
                </div>

                <div class="form-group col-md-4">
                    <label for="street">Street Address</label>
                    <input type="text" class="form-control" id="street" name="data[streetAddress]" placeholder="Input City" value="<?= isset($streetAddress) ? $streetAddress : "" ?>" required />
                </div>

                <div class="form-group col-md-2">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="data[state]" placeholder="Input State" value="<?= isset($state) ? $state : "" ?>" required />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="data[age]" id="age" placeholder="Input your age" value="<?= isset($age) ? $age : "" ?>" min="18" max="79" required />
                </div>

                <div class="form-group col-md-4">
                    <label for="zipCode">Postal Code</label>
                    <input type="text" class="form-control" name="data[postalCode]" id="zipCode" placeholder="Input Zipcode" value="<?= isset($postalCode) ? $postalCode : "" ?>" maxlength="10" required />
                </div>

                <div class="form-group col-md-6">
                    <label for="inputZip">Phone Number</label>
                    <input type="text" class="form-control" name="data[phoneNumber]" id="phone" placeholder="Input Phone Number" value="<?= isset($phoneNumber) ? $phoneNumber : "" ?>" maxlength="19" required />
                    <input name="data[id]" id="id" value="<?= isset($_GET['employeeId']) ? $_GET['employeeId'] : "" ?>" hidden>
                </div>

            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary" href="./dashboard.php">Return</button>
    </form>
</div>

<?php
require_once("../assets/html/footer.html");
?>