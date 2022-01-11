//global var of the employees
var employees = [];
//create table of employees
async function createTable() {
    //get number of employees
    await displayEmployees();
    //jsgrid structure
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "70vh",
        //conditions
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        deleteConfirm: "Do you really want to delete this employee?",
        data: employees,
        //what data will be displayed
        fields: [{
                name: "id",
                type: "text",
                css: "d-none",
                width: 0,
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
    //add listener to changePage between dashboard and employees.php
    $(".jsgrid-grid-body tr").on("click", changePage)
}
async function displayEmployees() {
    await fetch("./library/employeeController.php?display=true")
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                employees.push(element);
            })
        })
}

async function changePage(e) {
    console.log();
    const userName = $(e.target).parent().children()[0].textContent;
    //window.location = "library/employeeController.php?userId=" + userName;
    await fetch("../src/library/employeeController.php?userId=" + userName, {
        method: 'GET'
      })
    .then((response) => response.json())
    .then((data) => {
        console.log(data)
        //getEmployee();
    });

}

window.onload = createTable();