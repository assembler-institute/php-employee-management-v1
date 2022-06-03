const url = "../src/library/employeeController.php?action=getDataEmployees";

window.onload = getAllEmployees();

async function getAllEmployees() {
  await fetch(url)
    .then((response) => response.json())
    .then((data) => {
      const dataObject = JSON.parse(data);
      renderDashboard(dataObject);
    });
}

// function renderDashboard(data) {
//   data.map((employee) => {
//     console.log('hello');
//   });
// }

//const tableBody = document.getElementById("employeeTable");
