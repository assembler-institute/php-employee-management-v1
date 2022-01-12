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
        //TODO modify alert error
        // invalidNotify: function (args) {
        //     $('#alert-error-not-submit').removeClass('hidden');
        //     args.errors.forEach(element => {
        //         msg = element.message;
        //     })
        //     console.log(msg);
        // },

        //sending data when actions like edit, and insert are completed
        controller: {
            //the event when you click in the + button
            insertItem: async function (item) {
                await fetch("./library/employeeController.php?newEmployee=true", {
                        method: "POST",
                        body: JSON.stringify(item)
                    })
                    .then(response => console.log(response.text()))
            },
            //event when update an item and confirm
            updateItem: async function (item) {
                await fetch("./library/employeeController.php?update=" + item.id, {
                        method: "PUT",
                        body: JSON.stringify(item)
                    })
                    .then(response => response)
            },
        },

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
                validate: {
                    validator: "rangeLength",
                    message: function (value, item) {
                        return "The employee name should be between 3 and 20 characters. Entered name is \"" + value + "\" is out of specified range.";
                    },
                    param: [3, 20]
                }
            },
            {
                name: "email",
                type: "text",
                width: 200,
                validate: {
                    validator: "pattern",
                    message: function (value, item) {
                        return "Employee email is incorrect, please, follow the next instructions: 'email@mydomain.com'";
                    },
                    param: "^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"
                }
            },
            {
                name: "age",
                type: "number",
                width: 70,
                validate: {
                    validator: "range",
                    message: function (value, item) {
                        return "The employee age should be between 18 and 65, cannot contain characters too. Entered age is \"" + value + "\" is out of specified range.";
                    },
                    param: [18, 65]
                }
            },
            {
                name: "streetAddress",
                title: "Street No",
                type: "number",
                align: "right",
                width: 100,
            },
            {
                name: "city",
                type: "text",
                width: 100,
                validate: "required"
            },
            {
                name: "state",
                type: "text",
                width: 60
            },
            {
                name: "postalCode",
                type: "number",
                width: 90,
                validate: {
                    validator: "range",
                    message: function (value, item) {
                        return "The employee postal code should be between 1 and 8 numbers and cannot contain characters. Entered PC is \"" + value + "\" is out of specified range.";
                    },
                    param: [0, 999999]
                }
            },
            {
                name: "phoneNumber",
                title: "Phone",
                type: "number",
                width: 100,
                validate: {
                    validator: "range",
                    message: function (value, item) {
                        return "The employee phone number have to contain between 9 and 14 numbers, cannot contain characters too. Entered age is \"" + value + "\" is out of specified range.";
                    },
                    //maximum number
                    param: [100000000, 999999999999]
                }
            },
            {
                type: "control",
                width: 100,
                editButton: false,
                deleteButton: false,
                //insertButton

                //edit and delete btns
                itemTemplate: function (value, item) {
                    var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
                    //edit btn
                    var $customEditButton = $("<button>").attr({
                            class: "customGridEditbutton jsgrid-button jsgrid-edit-button",
                            "data-id": item.id
                        })
                        .on("click", changePage);
                    //delete button
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
                    //add button
                    var $customAddButton = $("<button>").attr({
                        class: "customGridAddbutton jsgrid-button jsgrid-add-button"
                    })
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
    const userName = $(e.target).data("id");
    e.stopPropagation();
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