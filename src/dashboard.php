
<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<?php
echo "jeff infectado";
// require_once "./library/loginManager.php";
?>
<form action="./library/loginController.php" method="post">
    <button type="submit" name="logout">Log out </button>
</form>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
</head>

<body>
    <form action="./library/loginManager.php" method="post">
        <button type="submit" name="logout">Log out </button>
    </form>

    <div id="jsGrid"></div>


</body>

<script language="javascript">
    //export * as dataEmployess from "../resources/employees.json";
    // var test =  dataEmployess.name;
    // console.log(test);

    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",

        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        deleteConfirm: 'Do you realy want to DELETE data?',

        //data: '../resources/employees.json',
        //data: datat,


        fields: [{
                name: "id",
                type: " text",
                validate: "required"
            },
            {
                name: "name",
                type: "text "
            },
            {
                name: "lastName",
                type: "text "
            },
            {
                name: "email",
                type: "text "
            },
            {
                name: "gender",
                type: " text"
            },
            {
                name: "city",
                type: " text"
            },
            {
                name: "streetAddress",
                type: " number"
            },
            {
                name: "state",
                type: " text"
            },
            {
                name: "age",
                type: " number "
            },
            {
                name: "postalCode",
                type: " number "
            },
            {
                name: "phoneNumber",
                type: "number "
            }
        ]
    });
</script> -->

</html>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js" integrity="sha512-blBYtuTn9yEyWYuKLh8Faml5tT/5YPG0ir9XEABu5YCj7VGr2nb21WPFT9pnP4fcC3y0sSxJR1JqFTfTALGuPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.css" integrity="sha512-fz1HF9fyPeFY4eK3GvDxWRjAnpUdoCZq+c96Gnt4kX4SCN/+r/iPyUiYE9iPMSrkXMZoqZ00YHPGy7SzdxYImA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" integrity="sha512-jx8R09cplZpW0xiMuNFEyJYiGXJM85GUL+ax5G3NlZT3w6qE7QgxR4/KE1YXhKxijdVTDNcQ7y6AJCtSpRnpGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.css" integrity="sha512-eH1q4oFTd2cxUn/8647YcQzF4OdnDiSt+JeQf5BFonITxV+qqDic8Xv3ZXHzIiijDB2V9noETN/09GBN2buCQQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.js" integrity="sha512-nm8Za6M6Cl+T55KoR6WlrnESdOMO7iKTh6P9vbQiPiT+U8+FxpLVUs8Hxu8vh+LDasQBvrqP1SBs3R8wHkadxg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" integrity="sha512-3Epqkjaaaxqq/lt5RLJsTzP6cCIFyipVRcY4BcPfjOiGM1ZyFCv4HHeWS7eCPVaAigY3Ha3rhRgOsWaWIClqQQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../assets/js/index.js" defer></script>
    <title>Document</title>
</head>
<body>
<div id="jsGrid">

</div>
</body>

</html>
<!-- <button><a>Log out</a></button> -->
