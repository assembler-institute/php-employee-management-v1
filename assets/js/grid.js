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

/*
F - log out (destroy session)
M - eliminar jsgrid
M - añadir jsgrid
M - editar employee.php
M - crear employee.php
D - controlar ir a employee.php directamente
F - employee.php -> return //header


When you do any of the actions of the employees, you must show an alert on the screen indicating if the action was successful or there was an error.
You must use PHP server variables related to the HTTP verbs in order to know what kind of request is coming from (POST, DELETE, …).

When the user has exceeded 10 min logged in or has previously logged out, the session for that user must be destroyed and redirected to the login page (index.php).

*/
