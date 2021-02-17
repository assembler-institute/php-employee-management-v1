fetch("././resources/employees.json").then(response => {
    return response.json();
    }).then(data => {
        renderGrid("employeesDashboard");
        createGrid(data);
})

function renderGrid(tableID){
    let tableTemplate = `
        <table id="${tableID}">
            <tr id="tableHeader"></tr>
        </table>`
    document.querySelector("#jsGrid").innerHTML = tableTemplate;
}

function createGrid(data){
    let headers = Object.keys(data[0])
    headers.forEach(el => {
        document.querySelector('#tableHeader').insertAdjacentHTML('beforeend', `<td>${el}</td>`)
    })
    data.forEach(employee => {
        document.querySelector("tbody").insertAdjacentHTML('beforeend', `<tr id="employee${employee["id"]}"></tr>`)
        Object.values(employee).forEach(value => {
            document.querySelector("#employee" + employee["id"]).insertAdjacentHTML('beforeend', `<td>${value}</td>`)
        })
    })
}