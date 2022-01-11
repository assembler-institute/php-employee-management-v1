console.log("Hola");

fetch("../src/library/employeeController.php")
    .then((response) => response.text())
    .then((data) => {
        console.log(data)
        //getEmployee();
    });