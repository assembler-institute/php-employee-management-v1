document.addEventListener("DOMContentLoaded", function (event) {
  // Read JSON by fetch
  fetch("../../resources/employees.json")
    .then((res) => res.json())
    .then((data) => setupJsGrid(data));
});

// Create & Delete for AJAX
function insertNewEntry({ item }) {
  makeRequest(item, "create");
}

function deleteEntry({ item }) {
  makeRequest(item, "delete");
}

function makeRequest(item, action) {
  fetch("../../src/library/employeeController.php", {
    method: "post",
    body: JSON.stringify({
      item: item,
      action: action,
    }),
    headers: {
      "Content-Type": "application/json",
    },
  }).then((res) => cosole.log(res));
  // Get backend response
}

function setupJsGrid(data) {
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "400px",

    inserting: true,
    editing: false,
    sorting: true,
    paging: true,

    onItemInserted: insertNewEntry,
    onItemDeleted: deleteEntry,

    deleteConfirm: "Do you really want to delete the employee?",

    data: data,

    fields: [
      {
        name: "name",
        type: "text",
        validate: "required",
      },
      {
        name: "age",
        type: "text",
        validate: "required",
      },
      {
        name: "streetAddress",
        type: "text",
        validate: "required",
      },
      {
        name: "city",
        type: "text",
        validate: "required",
        textField: "Name",
      },
      {
        name: "state",
        type: "text",
        validate: "required",
        textField: "Name",
      },
      {
        name: "phoneNumber",
        type: "text",
        validate: "required",
        title: "Phone number",
      },
      {
        type: "control",
      },
    ],
  });
}
