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
        height: "400px",

        filtering: true,
        editing: true,
        sorting: true,
        paging: true,
        pageSize: 10,
        pageButtonCount: 5,
        deleteConfirm: 'Do you really Want DELETE THIS DATA? ',

        data: await callDataEmploee(),

        fields: [
            { name: "name", type: "text" },
            { name: "lastName", visible: false },
            { name: "email", type: "text" },
            { name: "gender", visible: false },
            { name: "city", type: "text"},
            { name: "streetAddress", type: "number" },
            { name: "state", type: "text" },
            { name: "age", type: "number" },
            { name: "postalCode", type: "number" },
            { name: "phoneNumber", type: "number" },
            { type: "control" }
        ]
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