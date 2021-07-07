const employeeUrl = "../../src/library/employeeController.php";

$.ajax({
  url: employeeUrl,
  method: "GET",
})
  .done(function (response) {
    renderTable(response);
    $("#navEmployee")
      .attr("href", "./employee.php?new=true")
      .removeClass("disabled");
  })
  .fail(function (response) {})
  .always(function () {});

function insertItemHandler(item) {
  return $.ajax({
    type: "POST",
    url: employeeUrl,
    data: item,
  });
}

function deleteItemHandler(item) {
  console.log(item);
  return $.ajax({
    type: "DELETE",
    url: employeeUrl,
    data: item,
  });
}

function renderTable(employeesJson = {}) {
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "auto",
    inserting: true,
    editing: false,
    sorting: true,
    paging: true,
    autoload: true,
    // filtering: true,
    rowDoubleClick: function (item) {
      window.location.replace("./employee.php?id=" + item.item.id);
    },

    controller: {
      insertItem: function (item) {
        return insertItemHandler(item);
      },
      deleteItem: function (item) {
        deleteItemHandler(item);
      },
    },

    data: employeesJson,

    fields: [
      { name: "id", title: "id", type: "text", visible: false },
      {
        name: "name",
        title: "Name",
        type: "text",
        width: 3,
        validate: "required",
      },
      { name: "email", title: "Email", type: "text", width: 10 },
      { name: "age", title: "Age", type: "number", width: 2 },
      { name: "streetAddress", title: "Street No.", type: "number", width: 2 },
      { name: "city", title: "City", type: "text", width: 3 },
      { name: "state", title: "State", type: "text", width: 2 },
      { name: "postalCode", title: "Postal Code", type: "number", width: 2 },
      { name: "phoneNumber", title: "Phone Number", type: "number", width: 3 },
      { type: "control", width: 1, editButton: false },
    ],
  });
}
