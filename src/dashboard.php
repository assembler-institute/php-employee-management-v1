<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
session_start();
//echo $_SESSION['authUserId'];

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
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Employee Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
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
            },

            fields: [{
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
        //     type: "GET",
        //     url: "./library/employeeController.php",
        //     dataType: "html",
        //     success: function(data) {
        //         console.log(data);
        //     }
        // });
    </script>
</body>

</html>