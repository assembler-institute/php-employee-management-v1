<!-- TODO Employee view -->
<?php

include "../assets/html/header.html";

require "./library/employeeManager.php";
// Error message for users that don't exist
if (!isset($_GET["id"])) {
    echo "Employee not found";
    exit;
}
$employeeId = $_GET["id"];

$employee = getEmployee($employeeId);
if (!$employee) {
    echo "Employee not found";
    exit;
}
// Update information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    updateEmployee($_POST, $employeeId);
    // header("Location: ./dashboard.php");
}

    ?>
<!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
    </div>
    </nav>

<!-- VIEW MODE -->
    <div class="card-body col-6 mx-auto" style="display:<?php if($_GET["v"] == "view") { echo "block"; } else{ echo "none"; }?>">
        <table class="table">
            <tbody class="table-bordered">
                <tr>
                    <th>Name</th>
                    <td><?= $employee["name"]?></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><?= $employee["lastName"]?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $employee["email"]?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?= $employee["gender"]?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?= $employee["city"]?></td>
                </tr>
                <tr>
                    <th>Street Address</th>
                    <td><?= $employee["streetAddress"]?></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><?= $employee["state"]?></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><?= $employee["age"]?></td>
                </tr>
                <tr>
                    <th>Postal Code</th>
                    <td><?= $employee["postalCode"]?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><?= $employee["phoneNumber"]?></td>
                </tr>
            </tbody>
        </table>
    </div>

<!-- UPDATE MODE  -->
    <div class="container" style="display:<?php if($_GET["v"] == "update") { echo "block"; } else{ echo "none"; }?>">
        <form action="" method="POST" enctype="multipart/form">
            <div class="d-flex justify-content-center">
                <div class="col-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= $employee["name"]?>" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="<?= $employee["email"]?>" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" value="<?= $employee["city"]?>" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" name="state" value="<?= $employee["state"]?>" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input type="text" name="postalCode" value="<?= $employee["postalCode"]?>" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastName" value="<?= $employee["lastName"]?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" value="<?= $employee["gender"]?>" class="form-control">
                            <option value="male">man</option>
                            <option value="male">woman</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Street Address</label>
                        <input type="text" name="streetAddress" value="<?= $employee["streetAddress"]?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" value="<?= $employee["age"]?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phoneNumber" value="<?= $employee["phoneNumber"]?>" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-secondary mx-2">Cancel</button>
                        <button class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
include "../assets/html/footer.html"
    ?>