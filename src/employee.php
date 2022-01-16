<?php

// Header
include "../assets/html/header.html";

// Session checker
require_once "./library/loginManager.php";
checkSession();

// Get ID from the URL and the employee array in order to display teh employee details
require_once "./library/employeeManager.php";

    $employeeId = $_GET["id"];
    $employee = getEmployee($employeeId);

// If the request is POST (after clicking UPDATE in the form), employee data is changed in the JSON and the user is redirected to the Dashboard
if($_SERVER["REQUEST_METHOD"] == "POST"){
    updateEmployeeSync($_POST,$employeeId);
    header("Location:./dashboard.php");
}
?>

<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light container-xl">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="../assets/img/logo.jpg" alt="" width="25">
        </a>
        <a class="navbar-brand" href="#">Employees Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="#">Employee</a>
            </li>
        </ul>
        </div>
        <a class="link-primary" href="./library/loginController.php?logout=1">Log out</a>
    </div>
</nav>

<!-- Employee details and update  -->
    <main class="container container-xl my-5">
        <div class="card">
            <div class="card-header">
                <h3>Employee details: <b><?= $employee["name"]." ".$employee["lastName"]?></b></h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form"> 
                    <div class="d-flex justify-content-center">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $employee["name"]?>" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $employee["email"]?>" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" value="<?= $employee["city"]?>" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" value="<?= $employee["state"]?>" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="text" name="postalCode" value="<?= $employee["postalCode"]?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastName" value="<?= $employee["lastName"]?>" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" value="<?= $employee["gender"]?>" class="form-control" required>
                                    <option value="male">man</option>
                                    <option value="male">woman</option>
                                </select>
                            </div>
        
                            <div class="form-group">
                                <label>Street Address</label>
                                <input type="text" name="streetAddress" value="<?= $employee["streetAddress"]?>" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="age" value="<?= $employee["age"]?>" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phoneNumber" value="<?= $employee["phoneNumber"]?>" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="./dashboard.php" class="btn btn-secondary mx-2">Cancel</a>
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</main>


<!-- Footer -->
<?php
include "../assets/html/footer.html"
    ?>