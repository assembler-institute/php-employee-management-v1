$("#jsGrid").jsGrid({
  width: "80%",

  filtering: true,
  editing: true,
  inserting: true,
  sorting: true,
  paging: true,
  autoload: true,

  pageSize: 15,
  pageButtonCount: 5,

  deleteConfirm: "Do you really want to delete the client?",

  controller: {
    loadData: function (response) {
      return $.ajax({
        type: "GET",
        url: "../src/library/employeeController.php",
        data: response,
        dataType: "json",
      });
    },

    insertItem: $.noop,

    updateItem: $.noop,

    deleteItem: function (item) {
      return $.ajax({
        type: "DELETE",
        url: "./library/employeeController.php/?id=" + item.id,
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
