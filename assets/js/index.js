const tableBodyEl = document.getElementById('table-body');
const table = document.getElementById('table');
const addNewEmpBtnEl = document.getElementById('addNewEmp');
const createEmpButton = document.getElementById('createEmpButton');


const deleteEmpId = (e) => {

    const btnId = e.currentTarget.getAttribute('data');

    Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Delete',
        denyButtonText: `Don't delete`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            const sendReq = async () => {
                const req = await fetch(`.././src/library/employeeController.php`, {
                    method: 'DELETE',
                    body: JSON.stringify(+btnId)
                });
                const res = await req.json()
                console.log(res)
            }
            sendReq();
            clearRow(e);
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })



}



function createTableRowWihtEmp(id, name, email, age, streetAddress, city, state, postalCode, phoneNumber) {
    const trEl = document.createElement('tr')
    // const thEl = document.createElement('th');
    // thEl.setAttribute('scope', 'row');

    const nameData = document.createElement('td');
    nameData.textContent = name;

    const emailData = document.createElement('td');
    emailData.textContent = email;

    const ageData = document.createElement('td');
    ageData.textContent = age;

    const street_nData = document.createElement('td');
    street_nData.textContent = streetAddress;

    const cityData = document.createElement('td');
    cityData.textContent = city;

    const stateData = document.createElement('td');
    stateData.textContent = state;

    const postalData = document.createElement('td');
    postalData.textContent = postalCode;


    const phoneData = document.createElement('td');
    phoneData.textContent = phoneNumber;


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


    // trEl.appendChild(thEl);
    trEl.appendChild(nameData);
    trEl.appendChild(emailData);
    trEl.appendChild(ageData);
    trEl.appendChild(street_nData);
    trEl.appendChild(cityData);
    trEl.appendChild(stateData);
    trEl.appendChild(postalData);
    trEl.appendChild(phoneData);
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
        const { id, name, email, age, streetAddress, city, state, postalCode, phoneNumber } = emp;
        const empRow = createTableRowWihtEmp(id, name, email, age, streetAddress, city, state, postalCode, phoneNumber);
        tableBodyEl.appendChild(empRow);
    })
    const btnsdelete = document.querySelectorAll('[data]')
    btnsdelete.forEach(btn => btn.addEventListener('click', deleteEmpId));

}





const clearRow = (e) => {

    if (table.hasChildNodes()) {
        tableBodyEl.removeChild(e.target.parentElement.parentElement)
    }
}

const clearTable = () => {
    if (table.hasChildNodes()) {
        table.removeChild(tableBodyEl);
    }
}


const getEmpFormValues = () => {
    
    const id = document.getElementById('id').value = '';
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;
    const streetAddress = document.getElementById('streetAddress').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const postalCode = document.getElementById('postalCode').value;
    const phoneNumber = document.getElementById('phoneNumber').value;

    const data = {
       name, email, age, streetAddress, city, state, postalCode, phoneNumber, id
    }

    return data;
}


// events

const addNewEmp = (e) => {

    const addEmployeeForm = document.getElementById('addEmployeeForm');
    addEmployeeForm.classList.toggle('toggle');

    if (addEmployeeForm.classList == 'toggle') {
        addNewEmpBtnEl.textContent = '+'
    } else {
        addNewEmpBtnEl.textContent = 'x'
    }

}

addNewEmpBtnEl.addEventListener('click', addNewEmp);

createEmpButton.addEventListener('click', async (e) => {
    e.preventDefault();
    const newEmp = getEmpFormValues();

    const req = await fetch(`.././src/library/employeeController.php`, {
        method: 'POST',
        body: JSON.stringify(newEmp),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    const res = await req.text()
    console.log(res)

    clearTable();
    showEmp();
}

)

showEmp();




