window.onload = () => {
  checkCurrentUrl();
};

const getCurrentUrl = () => {
  let urlFile = window.location.href;
  return urlFile.substring(urlFile.lastIndexOf("/") + 1);
};

const checkCurrentUrl = () => {
  let currentUrl = getCurrentUrl();
  if (currentUrl === "dashboard.php") {
    getEmployees();
    addEvents();
  } else {
    addEmployee();
  }
};

const addEvents = () => {
  document
    .getElementById("dashboardAddNewEmployee")
    .addEventListener("click", () => {
      redirectEmployeePage();
    });

  document.getElementById("employeeLink").addEventListener("click", () => {
    redirectEmployeePage();
  });
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
const redirectEmployeePage = () => {
  window.location.replace(
    "http://localhost/employee-management/php-employee-management-v1/src/employee.php"
  );
};
const addEmployee = () => {
  let employeeForm = document.getElementById("employeeForm");
  document.getElementById("submitForm").addEventListener("click", (event) => {
    event.preventDefault();
    let formData = new FormData(employeeForm);
    fetch(
      "http://localhost/employee-management/php-employee-management-v1/src/library/employeeController.php",
      {
        method: "POST",
        body: formData,
      }
    );
    // .then((response) => {
    //   return response.json();
    // })
    // .then((data) => {
    //   console.log(data);
    // })
    // .catch((error) => console.error(error));
  });
};
