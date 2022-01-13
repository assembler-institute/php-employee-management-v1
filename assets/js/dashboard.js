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

    // filtering: true,
    editing: true,
    inserting: true,
    sorting: true,
    paging: true,

    pageSize: 15,
    pageButtonCount: 5,

    data: employeers,

    fields: [
      { name: "id", css: "hide", width: 0 },
      { name: "name", type: "text", title: "Name" },
      { name: "email", type: "text", title: "Email" },
      { name: "age", type: "number", title: "Age" },
      { name: "streetAddress", type: "number", title: "Street No." },
      { name: "city", type: "text", title: "City" },
      { name: "state", type: "text", title: "State" },
      { name: "postalCode", type: "number", title: "Postal Code" },
      { name: "phoneNumber", type: "number", title: "Phone Number" },
      { type: "control", modeSwitchButton: true, editButton: true },
    ],

    controller: {
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

    rowClick: function editEmployee(args) {
      let id = args["item"].id;
      location.assign(`./employee.php?editEmployee=${id}`);
    }
  });
}

function sendMessageOk(text){

  let messageOk = `<div class="alert alert-success msginfo" role="alert">${text}</div>`

  document.querySelector("main").insertAdjacentHTML("afterbegin", messageOk)

  setTimeout(function(){

      document.querySelector(".msginfo").remove()

      }

      ,3000)

}


function sendMessageError(text){

  let messageOk = `<div class="alert alert-danger msginfo" role="alert">${text}</div>`

  document.querySelector("main").insertAdjacentHTML("afterbegin", messageOk)

  setTimeout(function(){

      document.querySelector(".msginfo").remove()

      }

      ,3000)

}