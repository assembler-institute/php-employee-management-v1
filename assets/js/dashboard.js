//global var of the employees
var employees = [];
//listeners
//this listener is for when you hide the delete modal, it turns off the accept and cancel
$("#deleteModal").on("hidden.bs.modal", function () {
    $("#acceptDelete").off();
    $("#cancelDelete").off();
})
window.onload = createTable();
//create table of employees
async function createTable() {
    //get number of employees
    await displayEmployees();
    //jsgrid structure
    $("#jsGrid").jsGrid({

        width: "100%",
        height: "70vh",
        //Validator
        //if email is already in the database, or phone number already choosen
        onItemInserting: function (args) {
            console.log('validator');
            employees.forEach(element => {
                if (element.email == args.item.email) {
                    console.log('entra');
                    args.cancel = true;
                    alert("Email already in the database");
                } else if (element.phoneNumber == args.item.phoneNumber) {
                    args.cancel = true;
                    alert("Phone Number already in the database");
                }
            })
        },
        //conditions
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        confirmDeleting: false,
        //sending data when actions like edit, and insert are completed, delete functions is under jsgrid
        controller: {
            //the event when you click in the + button
            insertItem: async function (item) {
                await fetch("./library/employeeController.php?newEmployee=true", {
                        method: "POST",
                        body: JSON.stringify(item)
                    })
                    .then(response => {
                        if (response.ok) {
                            //appends alert success
                            $(".msgContainer").append(`
                                <div class="alert alert-success insertMsg" role="alert">
                                    Your employee was added!
                                </div>
                            `)
                        } else {
                            //appends alert error
                            $(".msgContainer").append(`
                            <div class="alert alert-danger insertMsg"  role="alert">
                            An error has ocurred, try again!
                            </div>
                            `)
                        }
                        //function that hides msg
                        fadeOutMsg($(".insertMsg"))
                    })
            },
            //event when update an item and confirm
            updateItem: async function (item) {
                await fetch("./library/employeeController.php?update=" + item.id, {
                        method: "PUT",
                        body: JSON.stringify(item)
                    })
                    .then(response => {
                        if (response.ok) {
                            //appends alert
                            $(".msgContainer").append(`
                                <div class="alert alert-success updateMsg" role="alert">
                                    Your employee was updated!
                                </div>
                            `)

                        } else {
                            //appends alert
                            $(".msgContainer").append(`
                            <div class="alert alert-danger updateMsg" role="alert">
                                Your employee was updated!
                            </div>
                        `)
                            //function that hides msg
                        }
                        fadeOutMsg($(".updateMsg"))
                    })

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
                title: "Name",
                align: "center",
                type: "text",
                width: 100,
                //validations
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
                title: "Email",
                align: "center",
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
                title: "Age",
                align: "center",
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
                align: "center",
                width: 100,
            },
            {
                name: "city",
                title: "City",
                type: "text",
                align: "center",
                width: 100,
                validate: "required"
            },
            {
                name: "state",
                type: "text",
                align: "center",
                width: 60
            },
            {
                name: "postalCode",
                title: "Postal Code",
                type: "number",
                align: "center",
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
                align: "center",
                type: "number",
                width: 140,
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

                //edit and delete btns
                itemTemplate: function (value, item) {
                    var result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);

                    //edit btn
                    var customEditButton = $("<button>").attr({
                        class: "btn btn-warning btn-xs",
                        "data-id": item.id
                    }).append("<i class='fas fa-user-edit'></i>")




                    //delete button, we add some data bs attr to open modal
                    var customDeleteButton = $("<button>").attr({
                            class: "btn btn-danger btn-xs",
                            "data-bs-toggle": "modal",
                            "data-bs-target": "#deleteModal",
                            "data-id": item.id
                        }).append("<i class='fas fa-trash-alt'></i>")

                        .on("click", (e) => {
                            $("#acceptDelete").on("click", () => {
                                $("#jsGrid").jsGrid("deleteItem", item);
                                deleteEmployee(item.id);
                            })
                            $("#cancelDelete").on("click", function () {
                                $("#acceptDelete").off("click", deleteEmployee)
                            })
                            e.stopPropagation()
                        })
                    //overview of employee(eye btn) 
                    var customViewButton = $("<button></button>").attr({
                        class: "btn btn-info btn-xs",
                        "data-id": item.id
                    }).on("click", changePage).append("<i class='fas fa-eye'></i>");

                    //spawn the buttons
                    return $("<div class='iconsRow'>").append(customEditButton).append(customDeleteButton).append(customViewButton)
                }
            }
        ]

    });
}


//fetch to get the employees and put in array, later we display in jsgrid()
async function displayEmployees() {
    await fetch("./library/employeeController.php?display=true")
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                employees.push(element);
            })
        })
}

//change page to employees when you click in the eye

function changePage(e) {
    var userName;
    //if target was the button
    if ($(e.target).data("id") != undefined) {
        userName = $(e.target).data("id");
    } else { //if target was the icon
        userName = $(e.target).parent().data("id");
    }
    e.stopPropagation();
    window.location = "employee.php?userId=" + userName;

}

async function deleteEmployee(item) {
    //i pass delete key in GET with the item value (ID)
    await fetch("./library/employeeController.php?delete=" + item, {
            method: "delete"
        })
        .then(response => {
            if (response.ok) {
                //displays msg alert
                $(".msgContainer").append(`
                <div class="alert alert-success deleteMsg" role="alert">
                    Your employee was deleted!
                </div>
            `)
            } else {
                //displays msg alert
                $(".msgContainer").append(`
                    <div class="alert alert-danger deleteMsg" role="alert">
                        An error has ocurred, try again!
                    </div>
                `)
            }
            //calls function that fades alert
            fadeOutMsg($(".deleteMsg"));
        })
}

function fadeOutMsg(msg) {
    setTimeout(function () {
        msg.fadeOut(1000);
        setTimeout(function () {
            msg.remove();
        })
    }, 5000)
}