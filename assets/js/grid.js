function fillJsGrid(employee){

    $("#grid").jsGrid({

        width: "100%",
        height: "auto",
        sorting: true,
        paging: true,
    
        pageSize: 5,
        pageButtonCount: 5,
    
        deleteConfirm: "Do you really want to delete the employee?",
    
        data: employee,
        fields: [
            { name: "name", type: "text", title: "Name"},
            { name: "email", type: "text", title: "Email"},
            { name: "age", type: "number", title: "Age"},
            { name: "phoneNumber", type: "number", title: "Phone Number"},
            { type: "control"}
        ],
    
        rowClick: function(args) {
            console.log(args.item);
            var getData = args.item;
            var keys = Object.keys(getData);
            var text = [];
        }
    });
    
}