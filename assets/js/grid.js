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
            // Get employee data
            const userData = args.item;
            const jsonData = JSON.stringify(userData);

            // Send employee to employee.php
            $(function() {
                $("<form action='employee.php' method='post'><input type='hidden' name='data' value='" + jsonData  + "'></input></form>").appendTo("body").submit().remove();
            });
        }
    });
    
}