<?php
include "./library/sessionHelper.php";

?>
<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Web site " />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <style>
        <?php include("./../assets/css/main.css"); ?>
    </style>
</head>

<body>
<?php include("./../assets/html/header.html") ?>
<div class="container" id="container-table">
    <div id="grid_table">czxcxc</div>

</div>

<?php include("./../assets/html/footer.html") ?>
<script>
    $("#grid_table").jsGrid({
        width: "100%",
        height: "400px",

        filtering: false,
        inserting: true,
        editing: true,
        sorting: false,
        paging: true,
        autoload: true,

        pageSize: 10,
        pageButtonCount: 5,

        confirmDeleting: true,
        deleteConfirm: "Do you really want to delete data?",

        // controller: {
        //     loadData: function(filter) {
        //         return $.ajax(
        //             type: "GET",
        //             url: "./library/fetch_data.php",
        //             data: filter
        //         );
        //     },
        // },

        fields: [
            {
                name: "name",
                type: "text",
                width: "10%",
                validate: "required"
            },
            {
                name: "email",
                type: "text",
                width: "15%",
                validate: "required"
            },
            {
                name: "age",
                type: "number",
                width: "5%",
                validate: "required"
            },
            {
                name: "streetAddress",
                type: "text",
                width: "10%",
                validate: "required"
            },
            {
                name: "city",
                type: "text",
                width: "10%",
                validate: "required"
            },
            {
                name: "state",
                type: "text",
                width: "5%",
                validate: "required"
            },
            {
                name: "postalCode",
                type: "text",
                width: "10%",
                validate: "required"
            },
            {
                name: "phoneNumber",
                type: "text",
                width: "10%",
                validate: "required"
            },
            { 
                type: "control", 
                modeSwitchButton: false, 
                editButton: false,
                width: "10%",
            }
        ],

    });
</script>
</body>
</html><!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
