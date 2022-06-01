// fetch('./resources/employees.json')
// .then(res => res.json())
// .then(data => console.log(data))
// .catch(err => console.log(err));

async function getEmployees() {

    const res = await fetch('./resources/employees.json');
    const data = await res.json();
    return data;

}

async function createTable() {
    const employees = await getEmployees();
    const tableBody = document.querySelector("#employee_table");
    
    const tableData = employees.map((value) => {
    const { name, lastName, email, age, city, state, streetAddress, id } = value;
        
        return (
            `<tr>
                <td data-id=${id}>${name}</td>
                <td data-id=${id}>${lastName}</td>
                <td data-id=${id}>${email}</td>
                <td data-id=${id}>${age}</td>
                <td data-id=${id}>${city}</td>
                <td data-id=${id}>${state}</td>
                <td data-id=${id}><a href="./src/library/employeeController.php?id=${id}">${streetAddress}<a/></td>
            </tr>`
        );
    }).join('');

    
    tableBody.innerHTML = tableData;


}

createTable();
