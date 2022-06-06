const tableBodyEl = document.getElementById('table-body');
const table = document.getElementById('table');
const addNewEmpBtnEl = document.getElementById('addNewEmp');


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
            clearTable(e);
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


showEmp();


const clearTable = (e) => {

    if (table.hasChildNodes()) {
        tableBodyEl.removeChild(e.target.parentElement.parentElement)
    }
}




// events



const addNewEmp = (e)=>{
    
    e.preventDefault();
    const addEmployeeForm = document.getElementById('addEmployeeForm');
    addEmployeeForm.classList.toggle('toggle');
}

addNewEmpBtnEl.addEventListener('click', addNewEmp)




