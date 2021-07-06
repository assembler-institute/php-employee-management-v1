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

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>