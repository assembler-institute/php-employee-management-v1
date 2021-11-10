<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.core.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.load-indicator.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.load-strategies.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.sort-strategies.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.validation.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.field.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.text.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.select.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.number.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.checkbox.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.control.js"></script>


    <title>Employee dashboard</title>
</head>

<body>
    <header>
        <?php
        require_once("../assets/html/header.html")
        ?>
    </header>

    <main>

        <div id="jsGrid" class="mt-5 container"></div>
    </main>
    <script>
        var clients = [{
                "Name": "Otto Clay",
                "Age": 25,
                "Country": 1,
                "Address": "Ap #897-1459 Quam Avenue",
                "Married": false
            },
            {
                "Name": "Connor Johnston",
                "Age": 45,
                "Country": 2,
                "Address": "Ap #370-4647 Dis Av.",
                "Married": true
            },
            {
                "Name": "Lacey Hess",
                "Age": 29,
                "Country": 3,
                "Address": "Ap #365-8835 Integer St.",
                "Married": false
            },
            {
                "Name": "Timothy Henson",
                "Age": 56,
                "Country": 1,
                "Address": "911-5143 Luctus Ave",
                "Married": true
            },
            {
                "Name": "Ramona Benton",
                "Age": 32,
                "Country": 3,
                "Address": "Ap #614-689 Vehicula Street",
                "Married": false
            }
        ];

        var countries = [{
                Name: "",
                Id: 0
            },
            {
                Name: "United States",
                Id: 1
            },
            {
                Name: "Canada",
                Id: 2
            },
            {
                Name: "United Kingdom",
                Id: 3
            }
        ];

        $("#jsGrid").jsGrid({
            width: "100%",
            height: "400px",

            inserting: true,
            editing: true,
            sorting: true,
            paging: true,

            data: clients,

            fields: [{
                    name: "Name",
                    type: "text",
                    width: 150,
                    validate: "required"
                },
                {
                    name: "Age",
                    type: "number",
                    width: 50
                },
                {
                    name: "Address",
                    type: "text",
                    width: 200
                },
                {
                    name: "Country",
                    type: "select",
                    items: countries,
                    valueField: "Id",
                    textField: "Name"
                },
                {
                    name: "Married",
                    type: "checkbox",
                    title: "Is Married",
                    sorting: false
                },
                {
                    type: "control"
                }
            ]
        });
    </script>

</body>

</html>