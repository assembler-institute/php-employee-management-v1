const dataPath = "../resources/employees.json";

$.getJSON(dataPath).done(function (employeesData) {
  $("#jsGrid").jsGrid({
    data: employeesData,
    width: "100%",
    height: "auto",
    inserting: true,
    editing: false,
    sorting: true,
    paging: true,
    pageSize: 10,
    pageButtonCount: 3,
    filtering: false,
    autoload: true,
    rowClick: function (args) {
      selectedItem = args.item;
      window.location = "../src/library/employeeController.php?ID=" + selectedItem.id;
    },
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
      deleteItem: function (item) {
        return $.ajax({
          type: "DELETE",
          url: "./library/employeeController.php",
          data: item,
        });
      },
    },

    fields: [
      { name: "id", type: "hidden", visible: false, width: 15 },
      {
        name: "name",
        title: "Name",
        type: "text",
        width: 50,
        align: "center",
        validate: "required",
      },
      {
        name: "email",
        title: "Email",
        type: "text",
        width: 100,
        align: "center",
        validate: "required",
      },
      {
        name: "age",
        title: "Age",
        type: "number",
        width: 30,
        align: "center",
        validate: "required",
      },
      {
        name: "streetAddress",
        title: "Stree No.",
        type: "text",
        width: 50,
        align: "center",
        validate: "required",
      },
      {
        name: "city",
        title: "City",
        type: "text",
        width: 50,
        align: "center",
        validate: "required",
      },
      {
        name: "state",
        title: "State",
        type: "text",
        width: 40,
        align: "center",
        validate: "required",
      },
      {
        name: "postalCode",
        title: "Postal Code",
        type: "number",
        width: 50,
        align: "center",
        validate: "required",
      },
      {
        name: "phoneNumber",
        title: "Phone Number",
        type: "number",
        width: 50,
        align: "center",
        validate: "required",
      },
      { type: "control", editButton: false },
    ],
  });
});
