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
                type: "control",
                width: 100,
                editButton: false,
                deleteButton: false,
                itemTemplate: function (value, item) {
                    var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
                    //edit btn
                    var $customEditButton = $("<button>").attr({
                            class: "customGridEditbutton jsgrid-button jsgrid-edit-button"
                        })
                        .on("click", changePage);
                    //custom delete button
                    var $customDeleteButton = $("<button>").attr({
                            class: "customGridDeletebutton jsgrid-button jsgrid-delete-button"
                        })
                        .on("click", () => {
                            console.log("nope");
                        });
                    //spawn the buttons
                    return $("<div>").append($customEditButton).append($customDeleteButton);
                }
            }
        ]

    });
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

function changePage(e) {
    const userName = $(e.target).parent().parent().parent().children()[0].textContent;
    console.log(userName);
    e.stopPropagation();
    window.location = "employee.php?userId=" + userName

}

window.onload = createTable();