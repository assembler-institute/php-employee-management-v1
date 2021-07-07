const dataPath = "../resources/employees.json";

async function getEmployees(dataPath) {
  let result = await $.getJSON(dataPath);
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "auto",
    // paging: true,
    pageSize: 15,
    pageButtonCount: 5,
    inserting: true,
    editing: true,
    sorting: true,
    paging: true,
    filtering: true,
    deleteConfirm:
      "This action will delete the employee from the system. Are you sure?",
    data: result,
    fields: [
      // { name: "id", type: "number" },
      { name: "name", type: "text", width: 50 },
      // { name: "lastName", type: "text", width: 50 },
      { name: "email", type: "email", width: 100 },
      { name: "age", type: "number", width: 50 },
      { name: "streetAddress", type: "text", width: 50 },
      { name: "city", type: "text", width: 50 },
      { name: "state", type: "text", width: 50 },
      { name: "postalCode", type: "number", width: 50 },
      { name: "phoneNumber", type: "number", width: 50 },
      // { name: "gender", type: "text", width: 50 },
      { type: "control" },
    ],
  });
}

getEmployees(dataPath);
