//global var of the employees
var employees = [];
//listeners
//this listener is for when you hide the delete modal, it turns off the accept and cancel
$("#deleteModal").on("hidden.bs.modal", function () {
    $("#acceptDelete").off();
    $("#cancelDelete").off();
})
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
        confirmDeleting: false,
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
                            class: "customGridEditbutton jsgrid-button jsgrid-edit-button",
                            "data-id": item.id
                        })
                        .on("click", changePage);
                    //custom delete button
                    var $customDeleteButton = $("<button>").attr({
                            class: "customGridDeletebutton jsgrid-button jsgrid-delete-button",
                            "data-bs-toggle": "modal",
                            "data-bs-target": "#deleteModal",
                            "data-id": item.id

                        })

                        .on("click", (e) => {
                            $("#acceptDelete").one("click", () => {
                                $("#jsGrid").jsGrid("deleteItem", item);
                                deleteEmployee(item.id);
                            })
                            $("#cancelDelete").one("click", function () {
                                $("#acceptDelete").off("click", deleteEmployee)
                            })
                            e.stopPropagation()
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

async function changePage(e) {
    console.log();
    const userName = $(e.target).data("id");
    e.stopPropagation();
    await fetch("../src/library/employeeController.php?userId=" + userName, {
        method: 'GET'
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data)
    });
    window.location = "employee.php?userId=" + userName;


}

async function deleteEmployee(item) {
    //i pass delete key in get with the item value (ID)
    await fetch("./library/employeeController.php?delete=" + item, {
            method: "delete"
        })
        .then(response => response)
}

window.onload = createTable();