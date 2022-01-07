
<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->


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

    var dataEmployee = '';
    function callEmployees(){
        $.ajax({
            url:"../resources/employees.json",
            success: function(data){
                var dataEmployee = data;
                console.log(dataEmployee)

            })
    }


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
</script>

</html>