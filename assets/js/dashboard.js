//const { data } = require("jquery");

window.addEventListener("DOMContentLoaded", async () => {
  let employeers = await getEmployeers();
  displayTypeTasks(employeers);
});

async function getEmployeers() {
  const response = await fetch(`./library/employeeController.php?getEmployeers`);
  const data = await response.json();
  return data;
}

function displayTypeTasks(employeers) {
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
      insertItem: function name(item) {
        return $.ajax({
          type: "POST",
          url: "./library/employeeController.php?addEmployee",
          data: item,
        }).done(async function (response) {
          let employeers = await getEmployeers();
          displayTypeTasks(employeers);
        });
      },
      deleteItem: function name(item) {
        return $.ajax({
          type: "DELETE",
          url: `./library/employeeController.php?delete=${item.id}`,
        }).done(async function (response) {
          console.log(response);
          let employeers = await getEmployeers();
          displayTypeTasks(employeers);
        });
      },

<<<<<<< HEAD
      rowClick: function(item) {
        console.log("halo")
        return $.ajax({
            type: "GET",
            url: "./library/employeeController.php?editEmployee",
            data: item,
          });
    },

=======
>>>>>>> 3559a0f7a25be7d70c8ec55eab97c255611eff6a
      updateItem: function name(item) {
        return $.ajax({
          type: "POST",
          url: "./library/employeeController.php?modifyEmployee",
           data: { data: item , '_method':'PUT'},
        })
        .done(async function (response) {
            console.log(response);
            let employeers = await getEmployeers();
            displayTypeTasks(employeers);
          });
        ;
      },
    },

    rowClick: function(args) {
      console.log(args.item);
      location.assign(`./employee.php?editEmployee=${args.item}`);
    }
  });
}
