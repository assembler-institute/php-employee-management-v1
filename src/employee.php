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
    <div class="col-8 mx-auto">
        <form action="" method="post" enctype="multipart/form">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value=<?= $employee["name"]?> class="form-control">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="name" value=<?= $employee["lastName"]?> class="form-control">
            </div>
        </form>
    </div>
<?php
include "../assets/html/footer.html"
    ?>