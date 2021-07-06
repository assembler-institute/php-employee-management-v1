<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
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
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" />

    <title>Dashboard</title>
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
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employee.php">Employees</a>
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

    <div class="px-5">
        <div id="jsGrid"></div>
    </div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
    <script>
        $("#jsGrid").jsGrid({
            width: "100%",
            height: "75vh",

            filtering: true,
            inserting: true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 5,
            pageButtonCount: 5,

            // data: clients,
            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "./library/employeeController.php",
                        dataType: "json",
                        data: filter,
                    });
                },
                insertItem: function(item) {
                    return $.ajax({
                        type: "POST",
                        url: "./library/employeeController.php",
                        data: item
                    });
                },
                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "./library/employeeController.php",
                        data: item,
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                        }
                    });
                },
            },

            fields: [{
                    name: 'id',
                    type: 'text',
                },
                {
                    name: "name",
                    type: "text",
                    width: 150,
                    validate: "required"
                },
                {
                    name: "age",
                    type: "text",
                    width: 50
                },
                {
                    type: "control"
                }
            ]
        });

        // $.ajax({
        //     type: "DELETE",
        //     url: "./library/employeeController.php",
        //     dataType: "html",
        //     success: function(data) {
        //         console.log(data);
        //     }
        // });
    </script>
</body>

</html>