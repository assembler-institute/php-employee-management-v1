let logoutBtn = document.getElementById("logoutBtn");

window.onload = () => {
  updateEmployees();
};

const getCurrentUrl = () => {
  let urlFile = window.location.href;
  return urlFile.substring(urlFile.lastIndexOf("/") + 1);
};

const updateEmployees = () => {
  let currentUrl = getCurrentUrl();
  if (currentUrl === "dashboard.php") {
    getEmployees();
  }
};

const getEmployees = () => {
  fetch(
    "http://localhost/employee-management/php-employee-management-v1/src/library/employeeController.php"
  )
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      renderEmployees(data);
    })
    .catch((error) => console.error(error));
};

const renderEmployees = (storedEmployees) => {
  storedEmployees.map((employe) => {
    listEmployees(employe);
  });
};

const listEmployees = (employe) => {
  let table = document.getElementById("dashboardEmployeeTable");
  let newTableRow = createTd(employe);
  table.appendChild(newTableRow);
};

const createTd = (employe) => {
  let tableRow = document.createElement("tr");
  tableRow.id = employe.id;
  tableRow.classList = "dashboard__employee__tr";
  employeTableData(employe, tableRow);
  return tableRow;
};

const employeTableData = (employe, tableRow) => {
  let employeeData = [
    employe.name,
    employe.email,
    employe.age,
    employe.streetAddress,
    employe.city,
    employe.state,
    employe.postalCode,
    employe.phoneNumber,
  ];
  employeeData.map((element) => {
    console.log(element);
    let tableData = document.createElement("td");
    tableData.textContent = element;
    tableRow.appendChild(tableData);
  });
  let tableDataBtn = document.createElement("td");
  let btn = document.createElement("button");
  btn.dataset.remove = "removeEmployee";
  btn.textContent = "DELETE";
  tableDataBtn.appendChild(btn);
  tableRow.appendChild(tableDataBtn);
};
