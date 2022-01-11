
const addNewEmployee = document.querySelector("#btn-add-employee");
const employeeTable = document.querySelector("#employees-table");
addNewEmployee.addEventListener("click", createRow);
function createRow(){
    const row = document.createElement("div");
    row.id="inputFormContainer"
    row.innerHTML = `
    <form action="" method="post" id="form1">
    <input type="text" name="name" placeholder = "name" class="form-control">
    <input type="text" name="email" placeholder = "email"class="form-control">
    <input type="number" name="age" placeholder = "age"class="form-control">
    <input type="number" name="streetNumber" placeholder = "Street Number"class="form-control">
    <input type="text" name="city" placeholder = "City"class="form-control">
    <input type="text" name="state" placeholder = "State"class="form-control">
    <input type="number" name="postalCode" placeholder = "Postal Code"class="form-control">
    <input type="number" name="phoneNumber" placeholder = "Phone Number"class="form-control">
      <a id="btn-cancel"class="btn btn-secondary btn-sm " href="#"><i class="fas fa-window-close"></i></a>
      <button type="submit" id="btn-success"class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
    </form>`
    document.querySelector("nav").insertAdjacentElement("afterend", row);

    let addEmployeeForm = document.querySelector("#form1");
    addEmployeeForm.addEventListener("submit", (e)=>{addEmployeeFetch(e)})
}

function addEmployeeFetch(e){
  e.preventDefault();
  var addEmployeeForm = document.querySelector("#form1");
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
      .then(data => displayNewEmployee(JSON.parse(data)))
}

function displayNewEmployee(employee){
  let row = document.createElement("tr")
  row.innerHTML=`
  <td>${employee.name}</td>
  <td>${employee.email}</td>
  <td>${employee.age}</td>
  <td>${employee.streetAddress}</td>
  <td>${employee.city}</td>
  <td>${employee.state}</td>
  <td>${employee.postalCode}</td>
  <td>${employee.phoneNumber}</td>
  <td>
  <a href='./library/employeeController.php?v=view&id=${employee.id}' class="btn btn-sm btn-outline-info"><i class="far fa-eye"></i></a>
  <a href='./library/employeeController.php?v=update&id=${employee.id}' class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-edit"></i></a>
  <a href='./library/employeeController.php?d=true&id=${employee.id}' class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
  </td>
  `
  employeeTable.appendChild(row)
  document.querySelector("#inputFormContainer").remove();
}
