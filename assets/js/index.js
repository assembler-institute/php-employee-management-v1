//global var of the employees
var employees = [];
//create table of employees
async function createTable() {
    //get number of employees
    await getEmployees();
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "100%",

        inserting: true,
        editing: true,
        sorting: true,
        paging: false,

        data: employees,

        fields: [{
                name: "name",
                type: "text",
                width: 150,
                validate: "required"
            },
            {
                name: "email",
                type: "text",
                width: 200
            },
            {
                name: "age",
                type: "text",
                width: 50
            },
            {
                name: "streetAddress",
                type: "text",
                align: "center",
                width: 100,
            },
            {
                name: "city",
                type: "text",
                width: 100,
            },
            {
                type: "control"
            }
        ]
    });

}
async function getEmployees() {
    await fetch("./../resources/employees.json")
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                employees.push(element);
            })
        })
}
window.onload = createTable();