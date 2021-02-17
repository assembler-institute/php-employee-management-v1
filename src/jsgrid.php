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
    <section class="jsGrid">
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
                width: "92%",
                height: "auto",

                inserting: true,
                editing: false,
                sorting: true,
                paging: true,

                data: data,

                fields: [
                    { name: "id", title:"ID", type: "number", width: 50 },
                    { name: "name", title:"Name", type: "text", width: 150, validate: "required"},
                    { name: "lastName", title:"Last Name", type: "text", width: 150, validate: "required"},
                    { name: "email", title:"Email", type: "text", width: 200, validate: "required"},
                    { name: "age", title:"Age", type: "number", width: 50 },
                    { name: "city", title:"City", type: "text", width: 100 },
                    { name: "postalCode", title:"Postal Code", type: "number", width: 75 },
                    { name: "phoneNumber", title:"Phone Number", type: "number", width: 80 },
                    { type: "control", editButton: false }
                ]
        });
                });

    </script>
