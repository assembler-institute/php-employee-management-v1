<!-- TODO Employee view -->
<?php
    require_once "../assets/html/header.html";
    require_once "./library/sessionHelper.php";
    sessionCheck();
    outOfTime();
    require_once "./library/employeeManager.php";
    if (isset($_GET["editEmployee"])) {
        $id = $_GET["editEmployee"];
        $employee = getEmployee($id);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ajax Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="styleSheet" href="../assets/css/main.css">
    <script defer src="../assets/js/validition.js"></script>
</head>

<body>
    <main>
        <?php
            if (isset($_GET["newEmployeeAdded"])) {
                echo "<p class='text-center alert alert-success'>Employee added sucessfully<p>";
            } else if (isset($_GET["employeeUpdated"])) {
                echo "<p class='text-center alert alert-success'>Employee updated sucessfully<p>";
            }
        ?>
        <form class="employeeForm" action="./library/employeeController.php" method="POST" id="formulary">
            <div class="formFlex">
                <div class="flexMember">
                    <?php if (isset($_GET["editEmployee"])) { ?>
                        <input type="hidden" id="id" name="id" required value=<?= isset($employee->id) ? $employee->id : "" ?>>
                    <?php } ?>
                    <label for="name">Name</label><br>
                    <input type="text" id="name" name="name" required value=<?= isset($employee->name) ? $employee->name : "" ?>>
                </div>

                <div class="flexMember">
                    <label for="lastName">Last name</label><br>
                    <input type="text" id="lastName" name="lastName" required value=<?= isset($employee->lastName) ? $employee->lastName : "" ?>>
                </div>
            </div>

            <div class="formFlex">
                <div class="flexMember">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" required value=<?= isset($employee->email) ? $employee->email : "" ?>>
                    <p>We will sell this data to some weird databank</p>
                </div>

                <div class="flexMember">
                    <label for="gender">Gender</label><br>
                    <select id="gender" name="gender">
                        <option value="other">Other</option>
                        <option value="man">Man</option>
                        <option value="woman">Woman</option>
                    </select>
                </div>
            </div>

            <div class="formFlex">
                <div class="flexMember">
                    <label for="city">City</label><br>
                    <input type="text" id="city" name="city" required value=<?= isset($employee->city) ? $employee->city : "" ?>>
                </div>

                <div class="flexMember">
                    <label for="streetAddress">Stree number</label><br>
                    <input type="number" id="streetAddress" name="streetAddress" required value=<?= isset($employee->streetAddress) ? $employee->streetAddress : "" ?>>
                </div>
            </div>

            <div class="formFlex">
                <div class="flexMember">
                    <label for="state">State</label><br>
                    <input type="text" id="state" name="state" required value=<?= isset($employee->state) ? $employee->state : "" ?>>
                </div>

                <div class="flexMember">
                    <label for="age">Age</label><br>
                    <input type="number" id="age" name="age" value=<?= isset($employee->age) ? $employee->age : "" ?> required>
                </div>
            </div>

            <div class="formFlex">
                <div class="flexMember">
                    <label for="employee-postalCode">Postal code</label><br>
                    <input type="number" id="postalCode" name="postalCode" required value=<?= isset($employee->postalCode) ? $employee->postalCode : "" ?>>
                </div>

                <div class="flexMember">
                    <label for="phoneNumber">Phone number</label><br>
                    <input type="number" id="phoneNumber" name="phoneNumber" value=<?= isset($employee->phoneNumber) ? $employee->phoneNumber : "" ?>>
                </div>
            </div>

            <div class="formFlex">
                <div class="flexButtons">
                    <button type="submit" name=<?= isset($_GET["editEmployee"]) ? "modifyEmployee" : "addEmployee" ?> class="btn btn-primary" id="formSub">submit</button>
                    <a href="dashboard.php"><button type="button" class="btn btn-secondary">Return</button></a>
                </div>
            </div>
        </form>
    </main>
    <?php require_once "../assets/html/footer.html"; ?>
</body>

</html>