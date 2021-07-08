<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
session_start();

if (!isset($_SESSION["loggedUsername"])) {
    header("Location:../index.php?accessDenied=true");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="../assets/js/timeout.js"></script>

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
    <?php require("../assets/html/header.php") ?>
    <main class="container-fluid">
        <div id="jsGrid"></div>
    </main>
    <?php require("../assets/html/footer.html") ?>

    <!-- Javascript -->
    <script>
        // Setting a JS Grid with the response
        $("#jsGrid").jsGrid({
            height: "100%",
            width: "100%",

            autoload: true,
            inserting: true,
            sorting: true,
            paging: true,
            // pageSize: 5,
            // pageIndex: 1,

            // Redirect to employee's page
            rowClick: function(args) {
                employeeRowId = args.item.id;
                $("#dashboardLink").toggleClass("active");
                $("#employeeLink").addClass("active");
                $.ajax({
                    url: "./library/employeeController.php",
                    type: "GET",
                    data: {
                        "employeeRowId": employeeRowId
                    },
                    success: function(response) {
                        console.log(response);
                        document.location = "./employee.php";
                    }
                });
            },

            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        url: "./library/employeeController.php",
                        type: "GET",
                        data: filter,
                        success: function(resp) {
                            console.log("GET: ", resp);
                        }
                    })
                },

                insertItem: function(item) {
                    return $.ajax({
                        url: "./library/employeeController.php",
                        type: "POST",
                        data: {
                            "newEmployee": item,
                        },
                        success: function(resp) {
                            console.log("POST: ", resp);
                            $("#jsGrid").jsGrid("loadData");
                            $("#postAlert").toggleClass("show");
                            setTimeout(() => $("#postAlert").toggleClass("show"), 3000);
                        }
                    });
                },

                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "./library/employeeController.php",
                        data: {
                            "deletedID": item.id
                        },
                        success: function(resp) {
                            console.log("DELETE: ", resp);
                            $("#deleteAlert").toggleClass("show");
                            setTimeout(() => $("#deleteAlert").toggleClass("show"), 3000);
                        }
                    });
                },
            },


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
                    type: "number",
                    width: 20
                },
                {
                    title: "St. Num.",
                    name: "streetAddress",
                    type: "number",
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
                    type: "number",
                    width: 30
                },
                {
                    title: "Phone",
                    name: "phoneNumber",
                    type: "number",
                    width: 40
                },
                {
                    type: "control",
                    width: 20,
                    editButton: false,
                }

            ]
        });
    </script>
</body>

</html>