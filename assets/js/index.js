var urlDelete = "../src/library/employeeController.php?delete=1";
var urlAdd = "../src/library/employeeController.php?add=1";
var urlUpdate = "../src/library/employeeController.php?update=1&id=";
var urlGetEmployee = "../src/library/employeeController.php?id=";
deleteEmployee();
updateEmployee();
const addNewEmployee = document.querySelector("#btn-add-employee");
const employeeTable = document.querySelector("#employees-table");
addNewEmployee.addEventListener("click", createRow);
function createRow(){
    const row = document.createElement("tr");
    row.id="inputFormContainer"
    row.innerHTML = `
    
    <td><form action="" method="post" id="form1"><input type="text" name="name" placeholder = "name" class="form-control"></form></td>
    <td><input form="form1" type="text" name="email" placeholder = "email"class="form-control"></td>
    <td><input form="form1" type="number" name="age" placeholder = "age"class="form-control"></td>
    <td><input form="form1" type="number" name="streetNumber" placeholder = "Street Number"class="form-control"></td>
    <td><input form="form1" type="text" name="city" placeholder = "City"class="form-control"></td>
    <td><input form="form1" type="text" name="state" placeholder = "State"class="form-control"></td>
    <td><input form="form1" type="number" name="postalCode" placeholder = "Postal Code"class="form-control"></td>
    <td><input form="form1" type="number" name="phoneNumber" placeholder = "Phone Number"class="form-control"></td>
    <td class="d-flex">
      <a id="btn-cancel"class="btn btn-secondary btn-sm " href="#"><i class="fas fa-window-close"></i></a>
      <button form="form1" type="submit" id="btn-success"class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
      </td>`
    employeeTable.insertAdjacentElement("beforebegin", row);

    let addEmployeeForm = document.querySelector("#form1");
    addEmployeeForm.addEventListener("submit", (e)=>{addEmployeeFetch(e)})
    let cancelAddEmployee = document.querySelector("#btn-cancel")
    cancelAddEmployee.addEventListener("click", cancelAddEmployeeFun)

}
function cancelAddEmployeeFun(){
  document.querySelector("#inputFormContainer").remove();
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
      fetch(urlAdd, {
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
  <td class="d-flex">
  <a href='./library/employeeController.php?v=view&id=${employee.id}' class="btn btn-sm btn-outline-info"><i class="far fa-eye"></i></a>
  <button data-update="${employee.id}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-edit"></i></button>
  <button data-delete="${employee.id}" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
  </td>
  `
  employeeTable.appendChild(row)
  document.querySelector("#inputFormContainer").remove();
  deleteEmployee()
  updateEmployee();
}
function deleteEmployee(){
const deleteButtons = document.querySelectorAll("button[data-delete]");

deleteButtons.forEach(btn=>{
  btn.addEventListener("click",()=>{
    const employeeId = btn.getAttribute("data-delete");
  fetch(urlDelete,{method:"POST", body:employeeId})
  .then(response => response.text())
  .then(data => removeDeletedEmployee(employeeId))
  })
})
}
function removeDeletedEmployee(id){
var row = document.querySelector(`button[data-delete="${id}"]`)
row.parentElement.parentElement.remove();
}

function updateEmployee(){
  const updateButtons = document.querySelectorAll("button[data-update]");
  updateButtons.forEach(btn=>{
    btn.addEventListener("click",()=>{
    const employeeId = btn.getAttribute("data-update");
    fetch(urlGetEmployee+employeeId)
    .then(response => response.text())
    .then(data => updateRow(JSON.parse(data),employeeId))
    })
  })
}

function updateRow(employee, UpdateId){
    const row = document.createElement("tr");
    row.id="inputFormContainer"
    row.innerHTML=
    `<td><form action="" method="post" id="form2"><input value = '${employee.name}' type="text" name="name" placeholder = "name" class="form-control"></form></td>
    <td><input value = '${employee.email}' form="form2" type="text" name="email" class="form-control"></td>
    <td><input value = '${employee.age}' form="form2" type="number" name="age" class="form-control"></td>
    <td><input value = '${employee.streetAddress}' form="form2" type="number" name="streetAddress" class="form-control"></td>
    <td><input value = '${employee.city}' form="form2" type="text" name="city" class="form-control"></td>
    <td><input value = '${employee.state}' form="form2" type="text" name="state" class="form-control"></td>
    <td><input value = '${employee.postalCode}' form="form2" type="number" name="postalCode" class="form-control"></td>
    <td><input value = '${employee.phoneNumber}' form="form2" type="number" name="phoneNumber"class="form-control"></td>
    <td class="d-flex">
      <a id="btn-cancel-update"class="btn btn-secondary btn-sm " href="#"><i class="fas fa-window-close"></i></a>
      <button form="form2" type="submit" id="btn-success"class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
      </td>`
      const currentRow = document.querySelector(`button[data-update="${employee.id}"]`).parentElement.parentElement
      //const prevRow = currentRow.previousElementSibling;
      currentRow.insertAdjacentElement("beforebegin", row);
      currentRow.style.display="none";
      //currentRow.remove();

     let updateEmployeeForm = document.querySelector("#form2");
     updateEmployeeForm.addEventListener("submit", (e)=> {updateEmployeeFetch(e,UpdateId)})
     let cancelUpdateEmployee = document.querySelector("#btn-cancel-update")
     cancelUpdateEmployee.addEventListener("click", ()=>{cancelUpdateEmployeeFun(currentRow)})

}

function cancelUpdateEmployeeFun(currentRow){
  document.querySelector("#inputFormContainer").remove();
  currentRow.style.display="table-row";
}

function updateEmployeeFetch(e,id){
  e.preventDefault();
  var updateEmployeeForm = document.querySelector("#form2");
  const updateEmployeeData = new FormData(updateEmployeeForm);
  // create object from FormData
  var object = {};
  updateEmployeeData.forEach(function(value, key){
    object[key] = value;
  });
  var updateEmployeeJSON = JSON.stringify(object);
  fetch(urlUpdate+id, {
    body: updateEmployeeJSON,
    method: 'POST', // *GET, POST, PUT, DELETE, etc.
  })
  .then(response => response.text())
  .then(data => displayUpdatedEmployee(JSON.parse(data)))
}

function displayUpdatedEmployee(employee){
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
  <td class="d-flex">
  <a href='./library/employeeController.php?v=view&id=${employee.id}' class="btn btn-sm btn-outline-info"><i class="far fa-eye"></i></a>
  <button data-update="${employee.id}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-edit"></i></button>
  <button data-delete="${employee.id}" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
  </td>
  `
  const currentRow = document.querySelector(`button[data-update="${employee.id}"]`).parentElement.parentElement
      //const prevRow = currentRow.previousElementSibling;
  currentRow.insertAdjacentElement("beforebegin", row);
  document.querySelector("#inputFormContainer").remove();
  deleteEmployee();
  updateEmployee();
  currentRow.remove();
}