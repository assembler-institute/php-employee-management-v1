$(".btn-primary").on("click", function(e){

    const employee = $("#employee-form").serializeArray();

    if(e.target.value === ""){
        $.ajax({
            type: "POST",
            url: "../src/library/employeeController.php",
            data: { add: employee },
            success: function(data){
                console.log(data);
            }
        });
    } else {
        $.ajax({
            type: "PUT",
            url: "../src/library/employeeController.php",
            data: { edit: employee },
            success: function(data){
                console.log(data);
            }
        });
    }
});