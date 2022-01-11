async function callDataEmploee() {
    let result = []
    try {
        result = await $.ajax({
            url: ".././resources/employees.json",
            success: function (data) {
                $dataEmployee = data;
            }
        })
        //console.log(result)
        return result;
    } catch (error) {
        console.error("Don't load the Data");
    }
};

async function callGrid(){
    console.log('asdfakfgljabn');
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "900px",

        // filtering: true,
        inserting: true,
        editing: true,
        sorting: true,
        autoload: true,
        paging: false,
        pageSize: 10,
        pageButtonCount: 5,
        deleteConfirm: 'Do you really Want DELETE THIS DATA? ',

        data: await callDataEmploee(),

        fields: [
            { name: "name", type: "text", validate: { validator: "required", message: "Name required" } },
            { name: "email", type: "text", width: 150, validate: { validator: "required", message: "Email required" } },   
            { name: "city", type: "text", validate: { validator: "required", message: "City" }},
            { name: "streetAddress", type: "number", validate: { validator: "required", message: "Street Adress required" }},
            { name: "state", type: "text", validate: { validator: "required", message: "State required" }},
            { name: "age", type: "number", validate: { validator: "range", param: [18, 80] } },
            { name: "postalCode", type: "number", validate: { validator: "required", message: "Postal code required" }},
            { name: "phoneNumber", type: "number",  validate: { validator: "required", message: "phone Number required" }},
            
            // { type: "control", },
            {
                type: "control",
                modeSwitchButton: false,
                editButton: true,
                rowClick:true,
                rowDoubleClick:true,
                
                headerTemplate: function() {
                    return $("<button>").attr("type", "button").text("Add")
                            .on("click", function () {
                                window.location.assign(`./../src/employee.php`)
                            });
                }
            
            },
        
        ],
        onItemUpdated: function(args){
            // console.log(args)
            console.log(args.item);
            // console.log("pepe")
            $.ajax({
                type:"POST",
                url: ".././src/library/employeeController.php?modifyEmployee",
                data: args.item,
                success: function (data) {
                    console.log(data)
                }
            })
        },
        onItemDeleted: function(args) {
            console.log(args)
        },
        rowClick: function(args) {
            // console.log(args.item["lastName"])
        },
        rowDoubleClick: function(args) {
            $idget= args["item"].id
            window.location.assign(`./../src/employee.php?id=${$idget}`)
        },
        onItemInserted: function(args) {
            console.log(args.item);
            $.ajax({
                type:"POST",
                url: ".././src/library/employeeController.php?addEmployee",
                data: args.item,
                success: function (data){
                    callGrid();
                }
            })
        },
    });

};

async function calltable() {
    var data = await  callDataEmploee();
    console.log(data);
    showContacts(data);
}

//callGrid();



function newTd(newContent) {
    var result = document.createElement('td');
    result.innerHTML = newContent;
    return result;
};

var listContactsTable = document.getElementById('jsGridBody');
function showContacts(contacts) {
    listContactsTable.innerHTML = "";
    //console.log(contacts);

    contacts.forEach(contact => {
        const tr = document.createElement('tr');
        tr.appendChild(newTd(contact.name));
        tr.appendChild(newTd(contact.email));
        tr.appendChild(newTd(contact.city));
        tr.appendChild(newTd(contact.streetAddress));
        tr.appendChild(newTd(contact.state));
        tr.appendChild(newTd(contact.age));
        tr.appendChild(newTd(contact.postalCode));
        tr.appendChild(newTd(contact.phoneNumber));
        tr.appendChild(newTd(
            `<button id="delButton" onclick="removeContact('${contact.firstName + contact.surName + contact.phone + contact.address}')">Delete</button>`
        ));

        listContactsTable.appendChild(tr)
    });
};


