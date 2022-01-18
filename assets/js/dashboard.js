window.addEventListener("DOMContentLoaded", async () => {
  let employeers = await getEmployeers();
  displayEmployeers(employeers);
});

//Request an all employeers
async function getEmployeers() {
  const response = await fetch(`./library/employeeController.php?getEmployeers`);
  const data = await response.json();
  return data;
}

//Show all operations CRUD from employeers in a table
function displayEmployeers(employeers) {
  $("#dashboard").jsGrid({
    height: "auto",
    width: "100%",

    editing: true,
    inserting: true,
    sorting: true,
    paging: true,

    pageSize: 15,
    pageButtonCount: 5,

    data: employeers,

    fields: [
      { name: "id",type: "hide", width: 0},
      { name: "name", type: "text", title: "Name", validate: "required" },
      { name: "email", type: "text", title: "Email", validate: "required" },
      { name: "age", type: "number", title: "Age", validate: "required" },
      { name: "streetAddress", type: "number", title: "Street No.", validate: "required" },
      { name: "city", type: "text", title: "City", validate: "required" },
      { name: "state", type: "text", title: "State", validate: "required" },
      { name: "postalCode", type: "number", title: "Postal Code", validate: "required" },
      { name: "phoneNumber", type: "number", title: "Phone Number", validate: "required" },
      { type: "control", modeSwitchButton: true, editButton: true },
    ],

    controller: {
      //Request a new employee
      insertItem: function addEmployee(item) {
        return $.ajax({
          type: "POST",
          url: "./library/employeeController.php?addEmployee",
          data: item,
        }).done(async function (response) {
          let employeers = await getEmployeers();
          displayEmployeers(employeers);
        });
      },

      //Request a delete employee
      deleteItem: function deleteEmployee(item) {
        return $.ajax({
          type: "DELETE",
          url: `./library/employeeController.php?delete=${item.id}`,
        }).done(async function (response) {
          console.log(response);
          let employeers = await getEmployeers();
          displayEmployeers(employeers);
          if(response.status = 200){
            sendMessageOk("Employee deleted sucessfully")
          }
        });
      },
      //Request a update employee
      updateItem: function updateEmployee(item) {
        return $.ajax({
          type: "POST",
          url: "./library/employeeController.php?modifyEmployee",
          data: { data: item , '_method':'PUT'},
        })
        .done(async function (response) {
            console.log(response);
            let employeers = await getEmployeers();
            displayEmployeers(employeers);
            if(response.status = 200){
              sendMessageOk("Employee updated sucessfully")
            }
          });
        ;
      },
    },

    //Click over the row employee selection
    rowClick: function editEmployee(args) {
      let id = args["item"].id;
      location.assign(`./employee.php?editEmployee=${id}`);
    }
  });
}

//Show a meesage with complete action
function sendMessageOk(text){
  let messageOk = `<div class="alert alert-success msginfo" role="alert">${text}</div>`
  document.querySelector("main").insertAdjacentHTML("afterbegin", messageOk)
  setTimeout(function(){
      document.querySelector(".msginfo").remove()
  },3000)
}

//Show a meesage with error action
function sendMessageError(text){
  let messageError = `<div class="alert alert-danger msginfo" role="alert">${text}</div>`
  document.querySelector("main").insertAdjacentHTML("afterbegin", messageError)
  setTimeout(function(){
    document.querySelector(".msginfo").remove()
  },3000)
};