//global var of the employees
var employees = [];
//create table of employees
async function createTable() {
    //get number of employees
    await getEmployees();
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "70vh",

        inserting: true,
        editing: false,
        sorting: true,
        paging: true,

        data: employees,

        fields: [{
                name: "id",
                type: "text",
                width: 40,
                validate: "required"
            },
            {
                name: "name",
                type: "text",
                width: 150,
                validate: "required"
            },
            {
                name: "email",
                type: "text",
                width: 200,
                validate: "required"
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
                validate: "required"
            },
            {
                type: "control"
            }
        ]
    });
    exampleListener();
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

function exampleListener() {
    $(".jsgrid-grid-body tr").on("click", changePage)
}

function changePage(e) {
    console.log();
    const userName = $(e.target).parent().children()[0].textContent;
    window.location = "employee.php?userId=" + userName

}

window.onload = createTable();