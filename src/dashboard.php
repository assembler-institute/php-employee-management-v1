<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!-- Prueba de Github Project -->
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
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <title>Document</title>
</head>

<body>
    <div id="jsGrid"></div>

    <script src="../node_modules/jquery/dist/jquery.min.js">
    </script>

    <script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
    <script>
        $("#jsGrid").jsGrid({
            width: "100%",
            height: "400px",

            inserting: true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,

            // data: clients,
            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "./library/employeeController.php",
                        dataType: "json",
                        data: filter,
                        success: function(data) {
                            console.log(data);
                        }
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
        //     dataType: "json",
        //     success: function(data) {
        //         console.log(data);
        //     }
        // });
    </script>
</body>

</html>