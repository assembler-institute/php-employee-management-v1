// tenemos que usarlo para hacer la parte del dashboard. 
// este js se encargará de hacer los fetch al empoloyeeController.php.

// let loginForm = document.getElementById("login-form");

// loginForm.addEventListener("submit", sendDataToPHP);
// el dashboard tendrá varios eventListeners (create, read, update, delete).

loadAllEmployees();

function loadAllEmployees() {
    fetch("./library/employeeController.php?action=listEmployees", { method: "GET" })
        .then(response => response.json())
        .then(data => {
            renderAllEmployees(data);
        });
}

function renderAllEmployees(data){
    console.log(data);

    const tableBody = document.querySelector("tbody");

    data.forEach((employee) => {
        console.log(employee.name);

        let tableRow = document.createElement("tr");
        tableRow.innerHTML = `
            <th scope="row">${employee.id}</th>
            <td>${employee.name}</td>
            <td>${employee.email}</td>
            <td>${employee.age}</td>
            <td>${employee.streetAddress}</td>
            <td>${employee.city}</td>
            <td>${employee.state}</td>
            <td>${employee.postalCode}</td>
            <td>${employee.phoneNumber}</td>
            <td scope="col" title="Remove employee"><a href=""><i class="bi bi-trash3-fill"></i></a></td>
        `
        tableBody.appendChild(tableRow);
    });
}


// function sendDataToPHP(e) {
//     e.preventDefault();

//     const formData = new FormData(loginForm);
//     console.log(formData);

//     fetch("../../src/library/employeeController.php?action=listemployees", {
//         method: "GET",
//     })
//         .then((response) => response.json())
//         .then((data) => {
            // if (data.status === "success") {
            //     alert("yes");
            // }
//             console.log(data);
//         })
//         .catch((err) => console.log("Request failed: ", err));
// }
