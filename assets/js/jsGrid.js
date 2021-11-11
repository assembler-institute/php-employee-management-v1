$("#jsGrid").jsGrid({
  width: "100%",
  height: "600px",

  inserting: true,
  filtering: true,
  editing: true,
  sorting: true,
  paging: true,

  autoload: true,

  controller: {
    loadData: function (item) {
      return $.ajax({
        type: "GET",
        url: "../resources/employees.json",
        dataType: "json",
        data: item,
      });
    },
    insertItem: function (item) {
      return $.ajax({
        type: "POST",
        url: "../resources/employees.json",
        dataType: "json",
        data: item,
      });
    },
  },

  //   data: json,

  fields: [
    { name: "id", type: "number", width: 20, align: "center" },
    { name: "name", type: "text", width: 50, align: "center" },
    { name: "lastName", type: "text", width: 50, align: "center" },
    { name: "email", type: "text", width: 50, align: "center" },
    { name: "city", type: "text", width: 50, align: "center" },
    { name: "streetAddress", type: "text", width: 50, align: "center" },
    { name: "state", type: "text", width: 20, align: "center" },
    { name: "age", type: "number", width: 20, align: "center" },
    { name: "postalCode", type: "number", width: 30, align: "center" },
    { name: "phoneNumber", type: "number", width: 50, align: "center" },

    { type: "control" },
  ],
});

console.log("GRID");
