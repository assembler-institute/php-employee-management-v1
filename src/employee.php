<!-- TODO Employee view -->
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
    <?php
    require_once "../assets/html/header.html";
    require_once "./library/sessionHelper.php";
    sessionCheck();

    if(isset($_GET["editEmployee"])) {
        $result = json_decode($_GET["editEmployee"]);
        var_dump($result);
    }
    ?>
    <main>
        <form class="employeeForm" action="./library/employeeController.php" method="POST">
            <div class="formFlex">
                <div class="flexMember">
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" value="">
            </div>
            <div class="flexMember">
            <label for="lastName">Last name</label><br>
            <input type="text" id="lastName" name="lastName" value="">
            </div>
            </div>
            <div class="formFlex">
            <div class="flexMember">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" value="">
            <p>We will sell this data to some weird databank</p>
            </div>
            <div class="flexMember">
            <label for="gender">Gender</label><br>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            </div>
            </div>
            <div class="formFlex">
                <div class="flexMember">
            <label for="city">City</label><br>
            <input type="text" id="city" name="city" value="">
            </div>
            <div class="flexMember">
            <label for="streetAddress">Stree number</label><br>
            <input type="number" id="streetAddress" name="streetAddress" value="">
            </div>
            </div>
            <div class="formFlex">
            <div class="flexMember">
            <label for="state">State</label><br>
            <input type="text" id="state" name="state" value="">
            </div>
            <div class="flexMember">
            <label for="age">Age</label><br>
            <input type="number" id="age" name="age" value="">
            </div>
            </div>
            <div class="formFlex">
            <div class="flexMember">
            <label for="employee-postalCode">Postal code</label><br>
            <input type="number" id="postalCode" name="postalCode" value="">
            </div>
            <div class="flexMember">
            <label for="phoneNumber">Phone number</label><br>
            <input type="number" id="phoneNumber" name="phoneNumber" value="">
            <input type="hidden" name="formEmployee" id="formEmployee">
            </div>
            </div>
            <div class="formFlex">
            <div class="flexButtons">
                <button type="submit" class="btn btn-primary">submit</button>
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