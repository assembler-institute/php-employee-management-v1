
const addNewEmployee = document.querySelector("#btn-add-employee");
const employeeTable = document.querySelector("#employees-table");
addNewEmployee.addEventListener("click", createRow);
function createRow(){
    const row = document.createElement("div");
    row.innerHTML = `
    <form action="" method="post" id="form1">
    <input type="text" name="name" placeholder = "name" class="form-control">
    <input type="text" name="email" placeholder = "email"class="form-control">
    <input type="number" name="age" placeholder = "age"class="form-control">
    <input type="number" name="streetNumber" placeholder = "Street Number"class="form-control">
    <input type="text" name="city" placeholder = "City"class="form-control">
    <input type="text" name="state" placeholder = "State"class="form-control">
    <input type="number" name="postalCode" placeholder = "Postal Code"class="form-control">
      <a id="btn-cancel"class="btn btn-secondary btn-sm " href="#"><i class="fas fa-window-close"></i></a>
      <button type="submit" id="btn-success"class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
    </form>`
    document.querySelector("nav").insertAdjacentElement("afterend", row);

    let addEmployeeForm = document.querySelector("#form1");
    addEmployeeForm.addEventListener("submit", (e)=>{
    e.preventDefault();
    const addEmployeeData = new FormData(addEmployeeForm);
    // create object from FormData
    var object = {};
    addEmployeeData.forEach(function(value, key){
    object[key] = value;
    });
    var addEmployeeJSON = JSON.stringify(object);
    var url = "../src/library/employeeController.php";
        fetch(url, {
          body: addEmployeeJSON,
          method: 'POST', // *GET, POST, PUT, DELETE, etc.
        })
        .then(response => response.text())
        //.then(data => console.log(data))
})
}