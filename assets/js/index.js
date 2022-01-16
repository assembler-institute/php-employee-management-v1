// Fetch URLs
const urlDelete = "../src/library/employeeController.php?delete=1";
const urlAdd = "../src/library/employeeController.php?add=1";
const urlUpdate = "../src/library/employeeController.php?update=1&id=";
const urlGetEmployee = "../src/library/employeeController.php?id=";

// Initialise Update and Delete buttons
deleteEmployee();
updateEmployee();

// ADD NEW EMPLOYEE
const addNewEmployeeBtn = document.querySelector("#btn-add-employee");
const employeeTable = document.querySelector("#employees-table");
addNewEmployeeBtn.addEventListener("click", createNewRow);

function createNewRow(){
  // Disables the Add new employee button
  addNewEmployeeBtn.classList.add("disabled");

  // Create a new row with empty inputs in the main table

  const row = document.createElement("tr");
  row.id="inputFormContainer"
  row.innerHTML = `
    <td><form action="" method="post" id="form1"><input type="text" name="name" class="form-control" required></form></td>
    <td><input form="form1" type="text" name="email" class="form-control" required></td>
    <td><input form="form1" type="text" name="age" class="form-control" required></td>
    <td><input form="form1" type="text" name="streetNumber" class="form-control" required></td>
    <td><input form="form1" type="text" name="city" class="form-control" required></td>
    <td><input form="form1" type="text" name="state" class="form-control" required></td>
    <td><input form="form1" type="text" name="postalCode" class="form-control" required></td>
    <td><input form="form1" type="text" name="phoneNumber" class="form-control" required></td>
    <td class="d-flex justify-content-around">
      <a id="btn-cancel"class="btn btn-secondary" href="#"><i class="fas fa-window-close"></i></a>
      <button form="form1" type="submit" id="btn-success"class="btn btn-success"><i class="fas fa-check"></i></button>
    </td>`
  
  // Adds the row as a first element of the table
    employeeTable.insertAdjacentElement("beforebegin", row);

  // Event listener for creating a new employee
    const addEmployeeForm = document.querySelector("#form1");
    addEmployeeForm.addEventListener("submit", (e)=>{addEmployeeFetch(e)})

  // Event listener for cancelling the creation of a new employee
    const cancelAddEmployee = document.querySelector("#btn-cancel")
    cancelAddEmployee.addEventListener("click", () => {
      document.querySelector("#inputFormContainer").remove();
      addNewEmployeeBtn.classList.remove("disabled");
    })
}

function addEmployeeFetch(e){

  e.preventDefault();
  addNewEmployeeBtn.classList.remove("disabled");

  const addEmployeeForm = document.querySelector("#form1");
  const addEmployeeData = new FormData(addEmployeeForm);
  
  // Creates object from FormData with all the data for the new employee
  const object = {};
  addEmployeeData.forEach(function(value, key){
  object[key] = value;
  });
  const addEmployeeJSON = JSON.stringify(object);

  // Sends the data from the Add New Employee form to the employeeController.php and gets an object as a response
  fetch(urlAdd, {
    body: addEmployeeJSON,
    method: 'POST',
  })
  .then(response => response.text())
  .then(data => displayNewEmployee(JSON.parse(data)))
}

function displayNewEmployee(employee){

  // Creates a new row in the main table with all the data returned from the fetch and appends it to the table
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
    <td class="d-flex justify-content-between">
      <a href='./library/employeeController.php?v=view&id=${employee.id}' class="btn btn-outline-info"><i class="far fa-eye"></i></a>
      <button data-update="${employee.id}" class="btn btn-outline-secondary"><i class="fas fa-user-edit"></i></button>
      <button data-delete="${employee.id}" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
    </td>
  `
  employeeTable.appendChild(row)
  document.querySelector("#inputFormContainer").remove();

  // Initialise newly added Update and Delete buttons
  deleteEmployee()
  updateEmployee();
}

// DELETE EMPLOYEE
function deleteEmployee(){

  // Event listener for all the DELETE buttons
  const deleteButtons = document.querySelectorAll("a[data-delete]");

  deleteButtons.forEach(btn=>{
    btn.addEventListener("click",()=>{
      deleteId= btn.getAttribute("data-delete");
    })
  })
}

// Remove deleted employee from the main table
function removeDeletedEmployee(id){
  const deleteRow = document.querySelector(`a[data-delete="${id}"]`)
  deleteRow.parentElement.parentElement.remove();
}

// Delete confirmation modal
const deleteBtnModal = document.querySelector("#deleteBtnModal");
let deleteId;
deleteBtnModal.addEventListener("click", () => {
  fetch(urlDelete,{method:"DELETE", body:deleteId})
  .then(response => response.text())
  .then(data => removeDeletedEmployee(deleteId))
})

// UPDATE EMPLOUYEE

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
    `<td><form action="" method="post" id="form2"><input value = '${employee.name}' type="text" name="name" placeholder = "name" class="form-control" required></form></td>
    <td><input value = '${employee.email}' form="form2" type="text" name="email" class="form-control" required></td>
    <td><input value = '${employee.age}' form="form2" type="text" name="age" class="form-control" required></td>
    <td><input value = '${employee.streetAddress}' form="form2" type="text" name="streetAddress" class="form-control" required></td>
    <td><input value = '${employee.city}' form="form2" type="text" name="city" class="form-control" required></td>
    <td><input value = '${employee.state}' form="form2" type="text" name="state" class="form-control" required></td>
    <td><input value = '${employee.postalCode}' form="form2" type="text" name="postalCode" class="form-control" required></td>
    <td><input value = '${employee.phoneNumber}' form="form2" type="text" name="phoneNumber"class="form-control" required></td>
    <td class="d-flex justify-content-around">
      <a id="btn-cancel-update"class="btn btn-secondary" href="#"><i class="fas fa-window-close"></i></a>
      <button form="form2" type="submit" id="btn-success"class="btn btn-success"><i class="fas fa-check"></i></button>
    </td>`
      const currentRow = document.querySelector(`button[data-update="${employee.id}"]`).parentElement.parentElement
      currentRow.insertAdjacentElement("beforebegin", row);
      currentRow.style.display="none";

     let updateEmployeeForm = document.querySelector("#form2");
     updateEmployeeForm.addEventListener("submit", (e)=> {updateEmployeeFetch(e,UpdateId)})
     let cancelUpdateEmployee = document.querySelector("#btn-cancel-update")
     cancelUpdateEmployee.addEventListener("click", ()=>{cancelUpdateEmployeeFun(currentRow)})

}
// Cancels the update employee process
function cancelUpdateEmployeeFun(currentRow){
  document.querySelector("#inputFormContainer").remove();
  currentRow.style.display="table-row";
}

// 
function updateEmployeeFetch(e,id){
  e.preventDefault();
  const updateEmployeeForm = document.querySelector("#form2");
  const updateEmployeeData = new FormData(updateEmployeeForm);

  // create object from FormData with the data of the updated employee
  const object = {};
  updateEmployeeData.forEach(function(value, key){
    object[key] = value;
  });
  const updateEmployeeJSON = JSON.stringify(object);

  // Sends the data from the updated employee form to the employeeController.php and gets an object as a response
  fetch(urlUpdate+id, {
    body: updateEmployeeJSON,
    method: 'PUT',
  })
  .then(response => response.text())
  .then(data => displayUpdatedEmployee(JSON.parse(data)))
}

// Displays the updated employee in the main table
function displayUpdatedEmployee(employee){
  // Creates a row with the newly updated data that is returned from the fetch
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
  <td class="d-flex justify-content-between">
    <a href='./library/employeeController.php?v=view&id=${employee.id}' class="btn btn-sm btn-outline-info"><i class="far fa-eye"></i></a>
    <button data-update="${employee.id}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-edit"></i></button>
    <button data-delete="${employee.id}" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
  </td>
  `

  const currentRow = document.querySelector(`button[data-update="${employee.id}"]`).parentElement.parentElement
  currentRow.insertAdjacentElement("beforebegin", row);

  // Removes the input form
  document.querySelector("#inputFormContainer").remove();
  
  // Initialise Update and Delete buttons
  deleteEmployee();
  updateEmployee();
  currentRow.remove();
}