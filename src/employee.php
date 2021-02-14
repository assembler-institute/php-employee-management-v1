<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="../assets/css/employee.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <?php
    include_once('./library/employeeManager.php');
    echo '<section class="section-employee">
        <form action="./library/employeeController.php" method="POST" class="employee" id="employee">
            <div class="employee__grupo" id="grupo__name">
                <label for="name" class="employee__label">First name</label>
                <input type="hidden" name="id" id="id" value="'.getEmployee('2')['id'].'">
                <input type="text" class="employee__input" name="name" id="name" value="'.getEmployee('2')['name'].'">
            </div>
            <div class="employee__grupo" id="grupo__lastName">
                <label for="lastName" class="employee__label">Last name</label>
                <input type="text" class="employee__input" name="lastName" id="lastName" value="'.getEmployee('2')['lastName'].'">
            </div>
            <div class="employee__grupo" id="grupo__email">
                <label for="email" class="employee__label">Email address</label>
                <input type="email" class="employee__input" name="email" id="email" value="'.getEmployee('2')['email'].'">
            </div>
            <div class="employee__grupo" id="grupo__gender">
                <label for="gender" class="employee__label">Gender</label>
                <select name="gender" class="employee__input" value="'.getEmployee('2')['gender'].'">
                    <option value="man">man</option>
                    <option value="woman">woman</option>
                </select>
            </div>
            <div class="employee__grupo" id="grupo__city">
                <label for="city" class="employee__label">City</label>
                <input type="text" class="employee__input" name="city" id="city" value="'.getEmployee('2')['city'].'">
            </div>
            <div class="employee__grupo" id="grupo__streetAddress">
                <label for="streetAddress" class="employee__label">Street address</label>
                <input type="text" class="employee__input" name="streetAddress" id="streetAddress" value="'.getEmployee('2')['streetAddress'].'">
            </div>
            <div class="employee__grupo" id="grupo__state">
                <label for="state" class="employee__label">State</label>
                <input type="text" class="employee__input" name="state" id="state" value="'.getEmployee('2')['state'].'">
            </div>
            <div class="employee__grupo" id="grupo__age">
                <label for="age" class="employee__label">Age</label>
                <input type="text" class="employee__input" name="age" id="age" value="'.getEmployee('2')['age'].'">
            </div>
            <div class="employee__grupo" id="grupo__postalCode">
                <label for="postalCode" class="employee__label">Postal code</label>
                <input type="text" class="employee__input" name="postalCode" id="postalCode" value="'.getEmployee('2')['postalCode'].'">
            </div>
            <div class="employee__grupo" id="grupo__phoneNumber">
                <label for="phoneNumber" class="employee__label">Phone number</label>
                <input type="text" class="employee__input" name="phoneNumber" id="phoneNumber" value="'.getEmployee('2')['phoneNumber'].'">
            </div>
            <div class="employee__grupo employee__grupo-btn-enviar">
                <input type="submit" name="return" class="btn returnbtn" id="cancelbtn" value="Return"></input>
                <input type="submit" name="submit" class="btn submitbtn" id="loginbtn" value="Submit"></input>
            </div>
        </form>
    </section>'
    ?>
</body>
</html>
