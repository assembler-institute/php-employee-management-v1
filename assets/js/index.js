const dataPath = "../resources/employees.json";

async function getEmployees(dataPath) {
  let result = await $.getJSON(dataPath);
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "auto",
    // paging: true,
    inserting: true,
    editing: false,
    sorting: true,
    paging: true,
    pageSize: 10,
    pageButtonCount: 3,
    filtering: true,
    autoload: true,
    deleteConfirm:
      "This action will delete the employee from the system. Are you sure?",

    controller: {
      insertItem: function (item) {
        return $.ajax({
          type: "POST",
          url: "./library/employeeController.php",
          data: item,
        });
      },
    },

    data: result,
    fields: [
      { name: "id", type: "hidden", css: "hide", width: 15 },
      { name: "name", type: "text", width: 50, validate: "required" },
      { name: "email", type: "email", width: 100 },
      { name: "age", type: "number", width: 30 },
      { name: "streetAddress", type: "text", width: 50 },
      { name: "city", type: "text", width: 50 },
      { name: "state", type: "text", width: 40 },
      { name: "postalCode", type: "number", width: 50 },
      { name: "phoneNumber", type: "number", width: 50 },
      { type: "control", editButton: false },
      // {
      //   type: "control",
      //   modeSwitchButton: false,
      //   editButton: true,
      //   headerTemplate: function () {
      //     return $("<button>")
      //       .attr("type", "button")
      //       .text("Add")
      //       .on("click", function () {
      //         showDetailsDialog("Add", {});
      //       });
      //   },
      // },
    ],
  });
}

getEmployees(dataPath);
