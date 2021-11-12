$("#jsGrid").jsGrid({
  width: "100%",

  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,

  pagerContainer: null,
  pageIndex: 1,
  pageSize: 10,
  pageButtonCount: 15,
  pagerFormat:
    "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
  pagePrevText: "Prev",
  pageNextText: "Next",
  pageFirstText: "First",
  pageLastText: "Last",
  pageNavigatorNextText: "...",
  pageNavigatorPrevText: "...",

  controller: {
    loadData: function (item) {
      return $.ajax({
        type: "GET",
        url: "../resources/employees.json",
        dataType: "json",
        data: JSON.stringify(item),
      });
    },
    insertItem: function (item) {
      $.ajax({
        type: "POST",
        url: "./library/employeeController.php",
        dataType: "json",
        data: JSON.stringify(item),
      });
    },
    deleteItem: function (item) {
      $.ajax({
        type: "DELETE",
        url: "./library/employeeController.php",
        dataType: "json",
        data: JSON.stringify(item),
      });
    },
    updateItem: function (item) {
      $.ajax({
        type: "PUT",
        url: "./library/employeeController.php",
        dataType: "json",
        data: JSON.stringify(item),
      });
    },
  },

  rowClick: function ({ item }) {
    window.location.href = `./employee.php?id=${item.id}`;
  },

  fields: [
    { name: "id", type: "number", visible: false },
    {
      title: "Name",
      name: "name",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      title: "age",
      name: "age",
      type: "number",
      width: 50,
      align: "center",
      validate: "required",
      validate: "required",
    },
    {
      title: "Email",
      name: "email",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      title: "Phone",
      name: "phoneNumber",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      title: "Address",
      name: "address",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      title: "City",
      name: "city",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      title: "State",
      name: "state",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      title: "Postalcode",
      name: "postalCode",
      type: "number",
      width: 50,
      align: "center",
      validate: "required",
    },
    { type: "control" },
  ],
});
