<!-- TODO Employee view -->
<?php
include_once "./../assets/html/header.html";
if (isset($_GET['id'])) {
    $idfin= $_GET['id'];
    require './library/employeeManager.php';
    getEmployee($idfin);
}
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
                    <div class="col-md-6 mt-md-0 mt-3"> <label>First Name</label> <input type="text" class="form-control" name="name" required value=<?= isset($_GET["id"]) ?  name : "" ?>> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Last Name</label> <input type="text" class="form-control" name="lastName"  required  value=<?= isset($_GET["id"]) ?  nmeLast : "" ?>> </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Email</label> <input type="email" class="form-control" name="email"  required value=<?= isset($_GET["id"]) ?  email : "" ?>> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Gender</label>
                    <?php 
                       if (isset($_GET['id']) ) {
                           if (gender == "man"){
                               echo "<div class='d-flex align-items-center mt-2'> <label class='option'> <input type='radio' name='radio' value='man' checked required>Male <span class='checkmark'></span> </label> <label class='option ms-4'> <input type='radio' name='radio' value='female' required>Female <span class='checkmark'></span> </label> </div>" ;
                           }else if(gender == "woman"){
                            echo "<div class='d-flex align-items-center mt-2'> <label class='option'> <input type='radio' name='radio' value='man'  required>Male <span class='checkmark'></span> </label> <label class='option ms-4'> <input type='radio' name='radio' value='female' checked required>Female <span class='checkmark'></span> </label> </div>" ;
                           }
                       } else{
                        echo "<div class='d-flex align-items-center mt-2'> <label class='option'> <input type='radio' name='radio' value='man'  required>Male <span class='checkmark'></span> </label> <label class='option ms-4'> <input type='radio' name='radio' value='female' required>Female <span class='checkmark'></span> </label> </div>" ;
                       }
                    ?>
         
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>City</label> <input type="text" class="form-control" name="city"  required value=<?= isset($_GET["id"]) ?  city : "" ?>> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Street Adress</label> <input type="text" class="form-control" name="streetAddress" required value=<?= isset($_GET["id"]) ?  streetAdress : "" ?>> </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>State</label> <input type="text" class="form-control" name="state" value=<?= isset($_GET["id"]) ?  state : "" ?> > </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Age</label> <input type="number" class="form-control" name="age"  value=<?= isset($_GET["id"]) ?  age : "" ?> > </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Postal Code</label> <input type="number" class="form-control" name="postalCode" value=<?= isset($_GET["id"]) ?  postalCode : "" ?> required> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Phone Number</label> <input type="tel" class="form-control" name="phoneNumber"  required value=<?= isset($_GET["id"]) ?  phoneNumber : "" ?>> </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary btn-lg" type="submit" name="submitForm"> Submit </button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submitForm'])) {
        // echo $_POST['radio'];
        if (isset($_GET['id'])){
            echo "Esta cuenta ya esta creada";
        }else{
            require './library/employeeManager.php';
            addEmployee();
        }
    }

    ?>
</body>

</html>