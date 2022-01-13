async function callDataEmploee() {
    let result = []
    try {
        result = await $.ajax({
            url: ".././resources/employees.json",
            success: function (data) {
                $dataEmployee = data;
            }
        })
        return result;
    } catch (error) {
        console.error("Don't load the Data");
    }
};



async function callGrid() {
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "900px",

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
            { name: "city", type: "text", validate: { validator: "required", message: "City" } },
            { name: "streetAddress", type: "number", validate: { validator: "required", message: "Street Adress required" } },
            { name: "state", type: "text", validate: { validator: "required", message: "State required" } },
            { name: "age", type: "number", validate: { validator: "range", param: [18, 80] } },
            { name: "postalCode", type: "number", validate: { validator: "required", message: "Postal code required" } },
            { name: "phoneNumber", type: "number", validate: { validator: "required", message: "phone Number required" } },

            {
                type: "control",
                modeSwitchButton: false,
                editButton: true,
                rowClick: true,
                rowDoubleClick: true,

                headerTemplate: function () {
                    return $("<button>").attr("type", "button").text("Add")
                        .on("click", function () {
                            window.location.assign(`./../src/employee.php`)
                        });
                }

            },

        ],
        onItemUpdated: function (args) {
            $.ajax({
                type: "POST",
                url: ".././src/library/employeeController.php?modifyEmployee",
                data: args.item,
            })
        },

        onItemDeleted: function(args) {
            //console.log(args.item);
            $.ajax({
                type: "POST",
                url: ".././src/library/employeeController.php?delEmployee",
                data: args.item,
                success: function (data) {
                    console.log(data);
                   // callGrid();
                }
            });
        },
        rowClick: function (args) {

        },
        rowDoubleClick: function (args) {
            $idget = args["item"].id
            window.location.assign(`./../src/employee.php?id=${$idget}`)
        },
       
        onItemInserting: function(args) {
            console.log($dataEmployee)
            $dataEmployee.forEach(element => {
                if(element.email == args.item.email){
                    console.log("entroaqui")  
                    args.cancel = true;
                    alert("Email already in the database");
                }
            });
        },
        onItemInserted: function (args) {
            if(args.item.name === "erick") {
                args.cancel = true;
                alert("Specify the name of the item!");
                console.log("ejej")
            }
            $.ajax({
                type: "POST",
                url: ".././src/library/employeeController.php?addEmployee",
                data: args.item,
                success: function (data) {
                    callGrid();
                }
            })
        }
    });

};

function timeSession(){
    var sessionTime= setTimeout(() => {
        $.ajax({
            type:"POST",
            url:".././src/library/employeeController.php?endSession",
            
        })
    }, 15000);

}


setInterval(() => {
    $.ajax({
        type: "POST",
        url: ".././src/library/sessionHelper.php?info",
        // data: args.item,
        success: function (data) {
            // console.log(data);
            if(data != ""){
                // console.log("entro aqui pasados 10 segundos")
                window.location.assign(`./../index.php`)
            }
           // callGrid();
        }
    })
}, 1000);