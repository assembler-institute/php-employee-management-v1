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

        filtering: true,
        editing: true,
        sorting: true,
        paging: false,
        pageSize: 10,
        pageButtonCount: 5,
        deleteConfirm: 'Do you really Want DELETE THIS DATA? ',

        data: await callDataEmploee(),

        fields: [
            { name: "name", type: "text", },
            { name: "lastName", type: "text", },
            { name: "email", type: "text", },   
            { name: "city", type: "text", },
            { name: "streetAddress", type: "number", },
            { name: "state", type: "text", },
            { name: "age", type: "number", },
            { name: "postalCode", type: "number", },
            { name: "phoneNumber", type: "number", },
            // { type: "control", },
            {
                type: "control",
                modeSwitchButton: false,
                editButton: true,
                rowClick:true,
                rowDoubleClick:true,
            },
            
            // {
            //     type: "control",
            //     modeSwitchButton: true,
            //     editButton: true,
            //     updateItem   :true,
            // },
        ],
        // onItemEditing: function(args) {
        //     // $(this).on("click", ()=>{
        //     //     console.log("jaksbkdn")
        //     console.log(args["item"].id)
        //     // })
        //     addEventListener("dblclick", ()=>{
        //         $pr= args["item"].id
        //         // console.log("he hecho doble click")
        //     })
            // console.log(args["item"])

            // $pepe= args["item"]
            // $(`#${$pepe}`).on("click" ,()=>{
            //     console.log("nasd")
            // })
           
            // $p=args["item"]
            // $proba= $p.id
            // // console.log($proba)
            // ($proba).on("dblclick" , () => {
            //     console.log("entra con doble click")
            // })
            
        // },
        rowClick: function(args) {

        },
        rowDoubleClick: function(args) {
            $idget= args["item"].id
            window.location.assign(`./../src/employee.php?id=${$idget}`)
            // console.log(args["item"].id)
        }
        
        
        //     // console.log(args["item"])
        //     // cancel editing of the row of item with field 'ID' = 0
        //     // if(args.item.ID === 1) {
        //     //     args.cancel = true;
        //     // }
        // }
        // rowclick: function(args){
        //     console.log(args)
        // },.,
        
        // editItem:function (item){
        //     // editButton: true
        //     console.log(item)
            
        // },
        // deleteItem: function(item){
        //     // console.log(item)
        // }
    });

};

async function calltable() {
    var data = await  callDataEmploee();
    console.log(data);
    showContacts(data);
}

callGrid();



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