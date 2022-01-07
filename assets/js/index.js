var clients = [
    { "Name": "Otto Clay", "Age": 25, "Country": 1, "Address": "Ap #897-1459 Quam Avenue", "Married": false },
    { "Name": "Connor Johnston", "Age": 45, "Country": 2, "Address": "Ap #370-4647 Dis Av.", "Married": true },
    { "Name": "Lacey Hess", "Age": 29, "Country": 3, "Address": "Ap #365-8835 Integer St.", "Married": false },
    { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
    { "Name": "Ramona Benton", "Age": 32, "Country": 3, "Address": "Ap #614-689 Vehicula Street", "Married": false }
];

fetch("../resources/employees.json")
.then(res => res.json())
.then(data => jsGridFun(data))

function jsGridFun(data){
    $("#jsGrid").jsGrid({
        width: "100%",
        //height: "400px",
    
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
    
        data: data,
    
        fields: [
            { name: "name", type: "text", width: 150, validate: "required" },
            { name: "email", type: "text", width: 150, validate: "required" },
            { name: "age", type: "number", width: 50 },
            { name: "streetAddress", type: "number", width: 50 },
            { name: "city", type: "text", width: 100 },
            { name: "state", type: "text", width: 50 },
            { name: "postalCode", type: "number", width: 50 },
            { name: "phoneNumber", type: "number", width: 200 },
            { type: "control" }
        ]
    });
}
