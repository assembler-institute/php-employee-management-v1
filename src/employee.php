<!-- TODO Employee view -->
<?php
include_once "./../assets/html/header.html"
?>
     <link rel="stylesheet" href="../assets/css/main.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login</title>
</head> 
<body>
    <!-- <form action="./../assets/html/header.html" method="post"></form> -->
    <div class="wrapper rounded bg-white">
        <div class="h3">Registration Form</div>
        <div class="form">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>First Name</label> <input type="text" class="form-control" name="name" required> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Last Name</label> <input type="text" class="form-control" name="lastName" required> </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Email</label> <input type="email" class="form-control" name="email" required> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <select  name="gender" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>City</label> <input type="text" class="form-control" name="city" required> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Street Adress</label> <input type="number" class="form-control" name="streetAddress" required> </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>State</label> <input type="text" class="form-control" name="state" required> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Age</label> <input type="number" class="form-control" name="age" required> </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Postal Code</label> <input type="number" class="form-control" name="postalCode" required> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Phone Number</label> <input type="tel" class="form-control" name="phoneNumber" required> </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary btn-lg" type="submit" name="submitForm"> Submit </button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submitForm'])) {
        require './library/employeeManager.php';
        addEmployee();
    }


    ?>
</body>

</html>