const tableBodyEl = document.getElementById('table-body');
const table = document.getElementById('table');
const addNewEmpBtnEl = document.getElementById('addNewEmp');
const createEmpButton = document.getElementById('createEmpButton');


const deleteEmpId = (e) => {

    const btnId = e.currentTarget.getAttribute('data');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
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

            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )


        }
    })



}



function createTableRowWihtEmp(id, name, email, age, streetAddress, city, state, postalCode, phoneNumber) {
    const trEl = document.createElement('tr');
    trEl.setAttribute('class', 'trtable__emp');
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
    // const iconDeleteEl = document.createElement('i');
    const btn = document.createElement('button');
    btn.setAttribute('data', id)
    btn.setAttribute('class', 'delete__Button')
    // iconDeleteEl.setAttribute('class', 'fa-solid fa-trash')
    // btn.append(iconDeleteEl)
    deleteBtnEl.appendChild(btn);

    const editBtnEl = document.createElement('td');
    const editBtn = document.createElement('a')
    const iconEditEl = document.createElement('i');
    editBtn.setAttribute('href', `.././src/library/employeeController.php?id=${id}`)
    editBtn.setAttribute('class', 'edit__button')
    iconEditEl.setAttribute('class', 'fa-solid fa-pen-to-square')
    // editBtn.innerHTML = "edit"
    editBtn.append(iconEditEl)
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
        const { id, name, email, age, streetAddress, city, state, postalCode, phoneNumber, gender, lastName } = emp;
        const empRow = createTableRowWihtEmp(id, name, email, age, streetAddress, city, state, postalCode, phoneNumber, gender, lastName);
        tableBodyEl.appendChild(empRow);
    })
    const btnsdelete = document.querySelectorAll('[data]')
    btnsdelete.forEach(btn => btn.addEventListener('click', deleteEmpId));

}

const clearForm = () => {
    const newEmpFormEl = document.getElementById('addEmployeeForm');
    Array.from(newEmpFormEl.children).map(el => {
        Array.from(el.children).forEach(el => el.value = '')
    })
    newEmpFormEl.classList.toggle('toggle');
    addNewEmpBtnEl.textContent = '+';
}




const clearRow = (e) => {

    if (table.hasChildNodes()) {
        tableBodyEl.removeChild(e.target.parentElement.parentElement)
    }
}

const clearTable = () => {
    Array.from(tableBodyEl.children).map(el => {
        if(!el.hasAttribute('id')) {
            tableBodyEl.removeChild(el)
        }
    })
}



const getEmpFormValues = () => {

    const id = document.getElementById('id').value = '';
    const name = document.getElementById('name').value;
    const lastName = document.getElementById('lastName').value = '';
    const gender = document.getElementById('gender').value = '';
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;
    const streetAddress = document.getElementById('streetAddress').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const postalCode = document.getElementById('postalCode').value;
    const phoneNumber = document.getElementById('phoneNumber').value;

    const data = {
        id, name, lastName, email, age, gender, streetAddress, city, state, postalCode, phoneNumber
    }

    return data;
}

const validateForm = () => {
    let error = false;

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;
    const streetNumber = document.getElementById('streetAddress').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const postalCode = document.getElementById('postalCode').value;
    const phoneNumber = document.getElementById('phoneNumber').value;

    if(name === ''){
        error = true;
    }
    if(email === ''){
        error = true;
    }
    if(age === ''){
        error = true;
    }
    if(streetNumber === ''){
        error = true;
    }
    if(city === ''){
        error = true;
    }
    if(state === ''){
        error = true;
    }
    if(postalCode === ''){
        error = true;
    }
    if(phoneNumber === ''){
        error = true;
    }

    return error;
}


// events

const addNewEmp = (e) => {

    const addEmployeeForm = document.getElementById('addEmployeeForm');
    addEmployeeForm.classList.toggle('toggle');

    if (addEmployeeForm.classList == 'toggle') {
        addNewEmpBtnEl.textContent = '+'
        addNewEmpBtnEl.style.background = "green";
    } else {
        addNewEmpBtnEl.textContent = 'x';
        addNewEmpBtnEl.style.background = "#F55353";
    }

}

addNewEmpBtnEl.addEventListener('click', addNewEmp);

createEmpButton.addEventListener('click', async (e) => {
    e.preventDefault();
    const validate = validateForm();
    const newEmp = getEmpFormValues();

    if(validate === true){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Fill the fields',
          })
    }else{
        const req = await fetch(`.././src/library/employeeController.php`, {
            method: 'POST',
            body: JSON.stringify(newEmp),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        const res = await req.text()
        console.log(res)
    
        clearTable()
        clearForm();
        Swal.fire(
            'Success!',
            'Employee was added correctly',
            'success'
          )
        showEmp();
    }
    

    
}

)



showEmp();





