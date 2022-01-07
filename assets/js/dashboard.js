window.addEventListener("DOMContentLoaded", async () => {
  let employees = await getEmployees();
  loadEmployeeTable(employees);
});

async function getEmployees() {
  const response = await fetch("./library/employeeController.php?getEmployees");
  const data = await response.json();
  return data;
}

function loadEmployeeTable(employees) {
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "400px",

    inserting: true,
    sorting: true,
    paging: true,

    data: employees,

    fields: [
      {
        name: "name",
        type: "text",
        width: 150,
        title: "Name",
        validate: "required",
      },
      { name: "email", type: "text", width: 200, title: "Email" },
      { name: "age", type: "text", width: 50, title: "Age" },
      { name: "streetAddress", type: "text", title: "Street No." },
      { name: "city", type: "text", title: "City" },
      { name: "state", type: "text", width: 50, title: "State" },
      { name: "postalCode", type: "number", title: "Postal Code" },
      { name: "phoneNumber", type: "number", title: "Phone Number" },
      { type: "control", editButton: false },
    ],
  });
}
