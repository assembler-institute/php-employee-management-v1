async function callDataEmploee() {
    let result
    try {
        result = await $.ajax({
            url: ".././resources/employees.json",
            success: function (data) {
                $dataEmployee = data;
            }
        })
        console.log(result)
        return result;
    } catch (error) {
        console.error("Don't load the Data");
    }
};

async function callGrid(){
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",

        filtering: true,
        editing: true,
        sorting: true,
        paging: true,

        data: await callDataEmploee(),

        fields: [
            { name: "name", type: "text", },
            { name: "lastName", type: "text", },
            { name: "email", type: "text", },
            { name: "gender", type: "text", },
            { name: "city", type: "text", },
            { name: "streetAddress", type: "number", },
            { name: "state", type: "text", },
            { name: "age", type: "number", },
            { name: "postalCode", type: "number", },
            { name: "phoneNumber", type: "number", },
            { type: "control" }
        ]
    });

};

callGrid();