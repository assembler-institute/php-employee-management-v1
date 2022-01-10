<!-- TODO Employee view -->
<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:./../index.php?notlogged=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/63f29c9463.js" crossorigin="anonymous"></script>
    <!-- My styles/Scripts -->
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<?php echo file_get_contents("./../assets/html/header.html", true);
?>
    <p id="nameLogged"><?php $_SESSION["user"] ?></p>
</div>

                        <button class="btn btn-outline-warning">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <section class="m-0 vh-100 row justify-content-center align-items-center">
            <form class="col-6 p-5 text-center bg-light">
                <h2>Employee Name</h2>
            <div class="row">
                <div class="col ">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name">
                <label for="inputEmail1" class="form-label">Email address</label>
                <input type="email" name="usermail" class="form-control" id="inputEmail">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" name="city">
                <label for="inputState" class="form-label">State</label>
                <input type="text" class="form-control" id="inputState" name="state">
                <label for="inputPostalCode" class="form-label">PostalCode</label>
                <input type="number" class="form-control" id="inputPostalCode" name="postalCode">
            </div>
            <div class="col">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" name="lastName">
                <label for="inputGender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="inputGender" name="gender">
                <label for="inputStreetAddress" class="form-label">Street Address</label>
                <input type="text" class="form-control" id="inputStreetAddress" name="streetAddress">
                <label for="inputAge" class="form-label">Age</label>
                <input type="number" class="form-control" id="inputAge" name="age">
                <label for="inputPhoneNumber" class="form-label">PhoneNumber</label>
                <input type="tel" class="form-control" id="inputPhoneNumber" name="phoneNumber">
            </div>
            </div>
            </form>
        </section>

</body>
</html>
