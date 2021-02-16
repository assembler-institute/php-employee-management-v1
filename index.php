<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/employee.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/error.css">
    <link rel="stylesheet" href="./assets/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <title>Employees Manager</title>
</head>
<body>
    <?php include_once('./assets/html/header.html'); ?>
    <?php if (isset($_GET['login'])) {
            $loginCheck = $_GET['login'];
            echo '<aside class="error_message">
                    <p class="error">'.$loginCheck.'</p>
                </aside>';
        }
    ?>
    <?php include_once('./assets/html/loginForm.html'); ?>
    <main class="main-container">
        <div id="JsGrid"></div>
    <section class="main">
    <section class="employee-form">
        <form action="" method="POST" id="employeeManager">
            <div class="form-entry">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="Enter employee's name">
            </div>
            <div class="form-entry">
                <label for="last-name">Last Name</label>
                <input type="text" name="last-name" id="last-name" value="Enter employee's last name">
            </div>
            <div class="form-entry">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="Enter employee's e-mail">
            </div>
            <div class="form-entry">
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender" value="Enter employee's gender">
            </div>
            <div class="form-entry">
                <label for="city">City</label>
                <input type="text" name="city" id="city" value="Enter employee's city of residence">
            </div>
            <div class="form-entry">
                <label for="street-number">Street Address</label>
                <input type="number" name="street-number" id="street-number" value="Enter employee's street number">
            </div>
            <div class="form-entry">
                <label for="state">State</label>
                <input type="text" name="state" id="state" value="">
            </div>
            <div class="form-entry">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" value="Enter employee's age">
            </div>
            <div class="form-entry">
                <label for="postal-code">Postal Code</label>
                <input type="number" name="postal-code" id="postal-code" value="Enter employee's postal-code">
            </div>
            <div class="form-entry">
                <label for="phone-number">Phone Number</label>
                <input type="number" name="phone-number" id="phone-number" value="Enter employee's phone-number">
            </div>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </form>
    </section>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
<script src="assets/js/createGrid.js"></script>
<script src="assets/js/submitForm.js"></script>
</html>

