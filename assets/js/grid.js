function fillJsGrid(){

    $("#grid").jsGrid({

        data: [],
        fields: [
            { name: "name", type: "text", title: "Name"},
            { name: "email", type: "text", title: "Email"},
            { name: "age", type: "number", title: "Age"},
            { name: "phoneNumber", type: "number", title: "Phone Number"},
            { type: "control", editButton:false }
        ],

        autoload: true,
        controller: {
            loadData: function(filter) {
                return $.ajax({
                    type: "GET",
                    url: "../src/library/employeeController.php",
                    data: filter,
                    dataType: "json"
                });
            },
            insertItem: function(item){
                return $.ajax({
                    type: "POST",
                    url: "../src/library/employeeController.php",
                    data: { add: item },
                    success: function(){
                        $(".alert-success").removeAttr('hidden');
                        setTimeout(function () {
                            $(".alert-success").attr('hidden', "hidden")
                        }, 5000);
                    }
                });
            },
            deleteItem: function(item){
                return $.ajax({
                    type: "DELETE",
                    url: "../src/library/employeeController.php",
                    data: { delete: item },
                    success: function(){
                        $(".alert-success").removeAttr('hidden');
                        setTimeout(function () {
                            $(".alert-success").attr('hidden', "hidden")
                        }, 5000);
                    }
                });
            }
        },

        width: "100%",
        height: "auto",

        sorting: true,
        inserting: true,
        
        paging: true,
        pageSize: 5,
        pageButtonCount: 5,
    
        confirmDeleting: true,
        deleteConfirm: "Do you really want to delete the employee?",

        noDataContent: "Not found",
    
        rowClick: function(args) {
            // Get employee data
            const userData = args.item;
            const jsonData = JSON.stringify(userData);

            // Send employee to employee.php
            $(function() {
                $("<form action='employee.php' method='post'><input type='hidden' name='data' value='" + jsonData  + "'></input></form>").appendTo("body").submit().remove();
            });
        },
  
    });
    
}
