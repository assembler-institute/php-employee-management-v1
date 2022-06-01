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

$("#wrapper").jsGrid({
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
            width: 80,
            validate: "required"
        },
        {
            name: "Email",
            type: "text",
            width: 150,
            validate: function email(mail) {
                const emailRegex = RegExp(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
                if (emailRegex === false) {
                    console.log("success");
                }
                // console.log(emailRegex);
            }
        },
        {
            name: "Age",
            type: "number",
            width: 40
        },
        {
            name: "Street No.",
            type: "number",
            width: 50,
        },
        {
            name: "City",
            type: "text",
            title: "City",
            width: 80,
        },
        {
            name: "State",
            type: "text",
            width: 40,
        },
        {
            name: "Postal Code",
            type: "number",
            width: 50,
        },
        {
            name: "Phone Number",
            type: "number",
            width: 70,
        },
        {
            type: "control"
        }
    ]
});