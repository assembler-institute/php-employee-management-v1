let renderTemplate = function (data){
    let employees = JSON.parse(data);
    let template = '';
    let id = 0;
    console.log(employees);
    employees.forEach(employee => {
        
        template = `
        <tr empId="${id+=1}" class="">
            <th scope="row" class="employee-data">${id}</th>
            <td class="employee-data">${employee.name}</td>
            <td class="employee-data">${employee.email}</td>
            <td class="employee-data">${employee.age}</td>
            <td class="employee-data">${employee.streetAddress}</td>
            <td class="employee-data">${employee.city}</td>
            <td class="employee-data">${employee.state}</td>
            <td class="employee-data">${employee.postalCode}</td>
            <td >${employee.phoneNumber}</td>
            <td class="delete"><span class="material-icons">
            delete
            </span></td>
        <tr>
    `;
    $('tbody').append(template);
    
    });
}

export {renderTemplate};