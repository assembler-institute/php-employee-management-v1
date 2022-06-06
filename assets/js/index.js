const tableBodyEl = document.getElementById('table-body');
const table = document.getElementById('table');
const addNewEmpBtnEl = document.getElementById('addNewEmp');



const deleteEmpId = (e) => {
    const btnId = e.currentTarget.getAttribute('data');
    const sendReq = async () => {
        const req = await fetch(`.././src/library/employeeController.php`, {
            method: 'DELETE',
            body: JSON.stringify(+btnId)
        });
        const res = await req.json()
        console.log(res)
    }
    sendReq();
    clearTable(e);
}



function createTableRowWihtEmp(name, lastName, email, id) {
    const trEl = document.createElement('tr')
    const thEl = document.createElement('th');
    thEl.setAttribute('scope', 'row');

    const nameData = document.createElement('td');
    nameData.textContent = name;

    const lastNameData = document.createElement('td');
    lastNameData.textContent = lastName;

    const emailData = document.createElement('td');
    emailData.textContent = email;

    const deleteBtnEl = document.createElement('td');
    const btn = document.createElement('button')
    btn.setAttribute('data', id)
    btn.innerText = 'Delete'
    deleteBtnEl.appendChild(btn);

    const editBtnEl = document.createElement('td');
    const editBtn = document.createElement('a')
    editBtn.setAttribute('href', `.././src/library/employeeController.php?id=${id}`)
    editBtn.innerText = 'Edit'
    editBtnEl.appendChild(editBtn);


    trEl.appendChild(thEl);
    trEl.appendChild(nameData);
    trEl.appendChild(lastNameData);
    trEl.appendChild(emailData);
    trEl.appendChild(deleteBtnEl);
    trEl.appendChild(editBtnEl);


    return trEl;
}



const getEmps = async () => {
    const res = await fetch('.././src/library/employeeController.php');
    const data = await res.json()

    return data;
}


const showEmp = async () => {
    const emps = await getEmps();
    emps.map(emp => {
        const { name, lastName, email, id } = emp;
        const empRow = createTableRowWihtEmp(name, lastName, email, id);
        tableBodyEl.appendChild(empRow);
    })
    const btnsdelete = document.querySelectorAll('[data]')
    btnsdelete.forEach(btn => btn.addEventListener('click', deleteEmpId));
    
}


showEmp();


const clearTable = (e) =>{

    if(table.hasChildNodes()){
        tableBodyEl.removeChild(e.target.parentElement.parentElement)
    }
}




// events

addNewEmpBtnEl.addEventListener('click', addNewEmp)




