<!-- TODO Employee view -->

<?php
require_once('library/loginManager.php');

session_start();

$userId = $_SESSION['authUserId'];
$authUser = getUserById($userId);
?>

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 px-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Employee Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="employee.php">Employees</a>
                    </li>
                </ul>
            </div>
            <li class="nav-item d-flex dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $authUser['name'] ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">
                            <i class="bi bi-person me-2"></i>
                            Profile
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="#">
                            <i class="bi bi-box-arrow-left me-2"></i>
                            logout
                        </a>
                    </li>
                </ul>
            </li>
        </div>
    </nav>

    <section class="form-section">
        <h3>User Detail</h3>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="email" class="form-control" id="inputName">
            </div>
            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="password" class="form-control" id="inputLastName">
            </div>
            <div class="col-6">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="text" class="form-control" id="inputEmial" placeholder="user@mail.com">
            </div>
            <div class="col-6">
                <label for="selectGender" class="form-label">Gender</label>
                <select class="form-control" id="SelectGender">
                    <option>Man</option>
                    <option>Women</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label for="inputAge" class="form-label">Age</label>
                    <input type="text" class="form-control" id="inputAge">
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Street Address</label>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="col-md-6">
                <label for="inputPhone" class="form-label">Phone number</label>
                <input type="text" class="form-control" id="inputPhone">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </section>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>