<!-- TODO Employee view -->
<!DOCTYPE html>
<html>

<head>
    <title>Ajax Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="styleSheet" href="../assets/css/main.css">
</head>

<body>
    <?php
    require_once "../assets/html/header.html";
    require_once "./library/sessionHelper.php";
    sessionCheck();
    ?>
    <main>
        <form class="employeeForm" action="./library/employeeController.php" method="POST">
            <div class="formFlex">
                <div class="flexMember">
            <label for="employee-name">Name</label><br>
            <input type="text" id="employee-name" name="employee-name" value="">
            </div>
            <div class="flexMember">
            <label for="employee-lastName">Last name</label><br>
            <input type="text" id="employee-lastName" name="employee-lastName" value="">
            </div>
            </div>
            <div class="formFlex">
            <div class="flexMember">
            <label for="employee-mail">Email</label><br>
            <input type="email" id="employee-mail" name="employee-mail" value="">
            <p>We will sell this data to some weird databank</p>
            </div>
            <div class="flexMember">
            <label for="employee-gender">Gender</label><br>
            <select id="employee-gender" name="employee-gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            </div>
            </div>
            <div class="formFlex">
                <div class="flexMember">
            <label for="employee-city">City</label><br>
            <input type="text" id="employee-city" name="employee-city" value="">
            </div>
            <div class="flexMember">
            <label for="employee-street">Stree number</label><br>
            <input type="text" id="employee-street" name="employee-street" value="">
            </div>
            </div>
            <div class="formFlex">
            <div class="flexMember">
            <label for="employee-state">State</label><br>
            <input type="text" id="employee-state" name="employee-state" value="">
            </div>
            <div class="flexMember">
            <label for="employee-age">Age</label><br>
            <input type="number" id="employee-age" name="employee-age" value="">
            </div>
            </div>
            <div class="formFlex">
            <div class="flexMember">
            <label for="employee-postalCode">Postal code</label><br>
            <input type="number" id="employee-postalCode" name="employee-postalCode" value="">
            </div>
            <div class="flexMember">
            <label for="employee-phone">Phone number</label><br>
            <input type="number" id="employee-phone" name="employee-phone" value="">
            </div>
            </div>
            <div class="formFlex">
            <div class="flexButtons">
                <button type="submit" name="addEmployeePHP"  class="btn btn-primary">submit</button>
            <a href="dashboard.php"><button type="button" class="btn btn-secondary">Return</button></a>
            </div>
            </div>
        </form>
    </main>
    <?php 
    require_once "../assets/html/footer.html";
    
    ?>
</body>
</html>