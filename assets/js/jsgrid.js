var settings = {
  url: "http://localhost/src/library/employeeController.php",
  method: "GET",
  timeout: 0,
};

$.ajax(settings).done(function (response) {
  renderTable(response);
});

function renderTable(employeesJson = {}) {
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "400px",

    inserting: true,
    editing: true,
    sorting: true,
    paging: true,

    data: employeesJson,

    fields: [
      {
        name: "name",
        title: "Name",
        type: "text",
        width: 15,
        validate: "required",
      },
      { name: "email", title: "Email", type: "text", width: 35 },
      { name: "age", title: "Age", type: "number", width: 6 },
      { name: "streetAddress", title: "Street No.", type: "number", width: 10 },
      { name: "city", title: "City", type: "text", width: 15 },
      { name: "state", title: "State", type: "text", width: 8 },
      { name: "postalCode", title: "Postal Code", type: "number", width: 10 },
      { name: "phoneNumber", title: "Phone Number", type: "number", width: 15 },
      { type: "control" },
    ],
  });
}
