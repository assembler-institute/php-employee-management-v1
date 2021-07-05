<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">

    <!-- Dependencies -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>

    <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css" />
    <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css" />
    <script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">

    <title>Dashboard</title>
</head>

<body>
    <?php require_once("../assets/html/header.html") ?>
    <main class="container-fluid">
        <div id="jsGrid"></div>
    </main>
    <?php require_once("../assets/html/footer.html") ?>

    <!-- Javascript -->
    <script>
        $(function() {
            $.getJSON("../resources/employees.json", function(response) {
                let employeesDb = response;

                // Setting a JS Grid with the response
                $("#jsGrid").jsGrid({
                    height: "100%",
                    width: "100%",

                    // Post when updated
                    onItemUpdated: () => console.log("Updated"),

                    inserting: true,
                    editing: true,
                    sorting: true,
                    paging: true,

                    data: employeesDb,

                    fields: [{
                            title: "Name",
                            name: "name",
                            type: "text",
                            width: 30,

                        },
                        {
                            title: "Email",
                            name: "email",
                            type: "text",
                            width: 60
                        },
                        {
                            title: "Age",
                            name: "age",
                            type: "text",
                            width: 20
                        },
                        {
                            title: "St. Num.",
                            name: "streetAddress",
                            type: "text",
                            width: 20
                        },
                        {
                            title: "City",
                            name: "city",
                            type: "text",
                            width: 35
                        },
                        {
                            title: "State",
                            name: "state",
                            type: "text",
                            width: 20
                        },
                        {
                            title: "Postal code",
                            name: "postalCode",
                            type: "text",
                            width: 30
                        },
                        {
                            title: "Phone",
                            name: "phoneNumber",
                            type: "text",
                            width: 40
                        },
                        {
                            type: "control",
                            width: 20
                        }

                    ]
                });
            });
        });
    </script>
</body>

</html>