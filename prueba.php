<?php
require('conexion_ajax_prueba.php');
//require("assets/html/header.html");
//session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" /> 
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>
    <?php
        $listEmployees = $_SESSION['listEmployees'];
        foreach ($listEmployees as $key => $list){
                echo "Name-->".$list['name'].'<br>';
                echo "lastName-->".$list['lastName']."<br>";
                echo "email-->".$list['email']."<br>";
                echo "gender-->".$list['gender']."<br>";
                echo "city-->".$list['city']."<br>";
                echo "streetAddress-->".$list['streetAddress']."<br>";
                echo "state-->".$list['state']."<br>";
                echo "age-->".$list['age']."<br>";
                echo "postalCode-->".$list['postalCode']."<br>";
                echo "phoneNumber-->".$list['phoneNumber']."<br>";
                echo "<hr>";
            }
    ?>
    <div id="jsGrid"></div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
<script>
    var product = [
        {    
        "id": "1",
        "name": "Rack",
        "lastName": "Lei",
        "email": "jackon@network.com",
        "gender": "man",
        "city": "San Jone",
        "streetAddress": "126",
        "state": "CA",
        "age": "24",
        "postalCode": "394221",
        "phoneNumber": "7383627627"
        },
    ];
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        data: product,
        fields: [
            { name: "id", type: "number" },
            { name: "name", type: "text", width: 50 },
            { name: "lastName", type: "text", width: 200 },
            { name: "email", type: "email", width: 50 },
            { name: "garder", type: "text", width: 200 },
            { name: "city", type: "text", width: 50 },
            { name: "streetAddress", type: "text", width: 50 },
            { name: "state", type: "text", width: 50 },
            { name: "age", type: "number", width: 50 },
            { name: "postalCode", type: "number", width: 50 },
            { name: "phoneNumber", type: "number", width: 50 },
        ]
    });
</script>
</html>
