<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <title>Inline table</title>
</head>
<body>
    <section>
        <div id="jsGrid"></div>
    </section>
</body>
</html>
    <script>
        fetch("../resources/employees.json")
            .then(response => {
            return response.json();
            })
            .then(data => {
                $("#jsGrid").jsGrid({
                width: "100%",
                height: "400px",

                inserting: true,
                editing: false,
                sorting: true,
                paging: true,

                data,

                fields: [
                    { name: "Id", type: "number", width: 50 },
                    { name: "Name", type: "text", width: 150, validate: "required" },
                    { name: "Last name", type: "text", width: 150, validate: "required" },
                    { name: "Email", type: "text", width: 200 },
                    { name: "Age", type: "number", width: 50 },
                    { name: "Phone number", type: "number", width: 50 },
                    { type: "control", editButton: false }
                ]
        });
                });

        // var clients = [
        //     { "Id": 1, "Name":"Rack", "Last name":"Lei", "Email":"jackon@network.com", "Age":"24", "Phone number":"91232876454" },
        //     { "Id": 2, "Name":"Jack", "Last name":"Lei", "Email":"jackon@network.com", "Age":"24", "Phone number":"91232876454" },
        //     { "Id": 3, "Name":"Mary", "Last name":"Lei", "Email":"jackon@network.com", "Age":"24", "Phone number":"91232876454" },
        //     { "Id": 4, "Name":"Donna", "Last name":"Lei", "Email":"jackon@network.com", "Age":"24", "Phone number":"91232876454" },
        //     { "Id": 5, "Name":"Roy", "Last name":"Lei", "Email":"jackon@network.com", "Age":"24", "Phone number":"91232876454" }
        // ];

    </script>
        <?php
            // echo "<script>document.writeln(employees);</script>";
        ?>
