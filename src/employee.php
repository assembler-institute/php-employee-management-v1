<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />

    <title>Employee</title>
</head>

<body>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <header>
        <?php
        require_once('../assets/html/header.html');
        ?>
    </header>

        
        <main class= "container">
            <br>
            <h2>Employee Details</h2>
            <br>
            <form action="/library/employeeController.php?update=true" method="POST">
            <input  type="hidden" class="form-control" name="id" id="employeeId" value="">
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="inputName" class="form-label font-weight-bold">Name</label>
                <input required type="text" class="form-control" name="name" id="inputName" value="">
            </div>
            <div class="col-sm-4">
                <label for="inputLastName" class="form-label font-weight-bold">Last Name</label>
                <input required type="text" class="form-control" name="lastName" id="inputLastName" value="">
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="inputEmail" class="form-label font-weight-bold">Email address</label>
                <input required type="email" class="form-control" name="email" id="inputEmail" placeholder="user@email.com" value="">
            </div>
            <div class="col-sm-4">
                <label for="selectGender" class="form-label font-weight-bold">Gender</label>
                <select required class="form-control" name="gender" id="selectGender">
                    <option value="man">Man</option>
                    <option value="woman">Woman</option>
                    <option Value="other">Other</option>
                </select>
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-4">
                    <label for="inputAge" class="form-label font-weight-bold">Age</label>
                    <input type="text" class="form-control" name="age" id="inputAge" value="">
            </div>
            <div class="col-sm-4">
                <label for="inputCity" class="form-label font-weight-bold">City</label>
                <input type="text" class="form-control" name="city" id="inputCity" value="">
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="inputState" class="form-label font-weight-bold">State</label>
                <br>
                <select id="selectState" class="form-select" name="state">
                    <option value="">Choose...</option>
                    <option value="CA">CA</option>
                    <option value="UA">UA</option>
                    <option value="WA">WA</option>
                    <option value="KNT">KNT</option>
                    <option value="GEO">GEO</option>
                    <option value="UT">UT</option>
                    <option value="TN">TN</option>
                    <option value="LU">LU</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="inputZip" class="form-label font-weight-bold">Zip</label>
                <input required type="text" class="form-control" name="postalCode" id="inputZip" value="">
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="inputAddress" class="form-label font-weight-bold">Street Address</label>
                <input required type="text" class="form-control" name="streetAddress" id="inputAddress" value="">
            </div>
            <div class="col-sm-4">
                <label for="inputPhone" class="form-label font-weight-bold">Phone number</label>
                <input required type="text" class="form-control" name="phoneNumber" id="inputPhone" value="">
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary" name="updateSubmit">Add new employee</button>
                <a href="../src/dashboard.php">
                <button type="button" class="btn btn-secondary" name="return">Return</button>
                </a>
            </div>
            </div>
            </form>
        </main>

    <footer>
        <?php
        require_once('../assets/html/footer.html');
        ?>
    </footer>

</body>

</html>