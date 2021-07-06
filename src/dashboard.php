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
                    name: "name",
                    type: "text",
                    width: 100,
                    validate: "required"
                },
                {
                    name: "email",
                    type: "text",
                    width: 100,
                    validate: [
                        "required",
                        {
                            message: "Please put a valid email address",
                            validator: function(value, item) {
                                return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(value);
                            },
                        }
                    ]
                },

                {
                    name: "age",
                    type: "text",
                    width: 50,
                    validate: {
                        validator: function(value) {
                            if (value > 0 && value < 80) {
                                return true;
                            }
                        },
                        message: function(value, item) {
                            return "The client age should be between 0 and 80. Entered age is \"" + value + "\" is out of specified range.";
                        },
                        param: [0, 80]
                    }
                },
                {
                    name: 'streetAddress',
                    type: 'text',
                    width: '50',
                    validate: 'required',
                },
                {
                    name: 'city',
                    type: 'text',
                    width: '100',
                    validate: 'required',
                },
                {
                    name: 'state',
                    type: 'text',
                    width: '50',
                    validate: 'required',
                },
                {
                    name: 'postalCode',
                    type: 'text',
                    width: '100',
                    validate: {
                        validator: function(value) {
                            if (value.length == 6) {
                                return true;
                            }
                        },
                        message: "Please enter a valid postal code",
                    }
                },
                {
                    name: 'phoneNumber',
                    type: 'text',
                    width: '100',
                    validate: {
                        validator: function(value, item) {
                            if (value.length < 20) {
                                return true;
                            }
                        },
                        message: "Please enter a valid phone number",
                    }

                },
                {
                    type: "control"
                }
            ]
        });

        // jsGrid.validators.email = {
        //     message: "Please enter a valid time, between 00:00 and 23:59",
        //     validator: function(value, item) {
        //         return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(value);
        //     }
        // }

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