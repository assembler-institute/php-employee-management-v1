const
    tbody           = document.getElementById('tbody'),
    createForm      = document.getElementById('createForm'),
    alertTimer      = document.getElementById('alertTimer'),
    alertDelete     = document.getElementById('alertDelete'),
    bodyModalDelete = document.getElementById('bodyModalDelete'),
    closeModalBtn   = document.getElementById('closeModalBtn'),
    exitSession     = document.getElementById('exitSession');

dashboardPrint();
setTimeout(() => {
    fetch('./library/sessionHelper.php?action=timer')
        .then(res => res.json())
        .then(data => {
            if (data === 'ok') {
                alertTimer.className = 'alert alert-warning';
                alertTimer.innerHTML = `
                    <h3>Session ended</h3>
                    <p>The session has been closed to protect the data.</p>
                    <p>You will be redirected to the login page in 10 seconds.</p>`
                setTimeout(() => {
                    location.reload();
                }, 10 * 1000);
            }
        })
}, 600 * 1000);

    function listJs(data){
        while(tbody.hasChildNodes()) {
            tbody.removeChild(tbody.firstChild);
        }
        for(let i = data.length - 1; i >= 0; i--) {
            let tr = document.createElement('tr');
            tr.innerHTML = `
            <td>${data[i].name} ${data[i].lastName}</td>
            <td>${data[i].email}</td>
                <td class="extra-info">${data[i].age}</td>
                <td class="extra-info">${data[i].streetAddress}</td>
                <td class="extra-info">${data[i].city}</td>
                <td class="extra-info">${data[i].state}</td>
                <td class="extra-info">${data[i].postalCode}</td>
                <td>${data[i].phoneNumber}</td>
                <td><a class="update" href="./employee.php?id=${data[i].id}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                <td onclick="confirmDelete(${data[i].id})" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-trash"></i></td>
            `
            tbody.appendChild(tr);
        }
    }

    function dashboardPrint(){
        fetch ('./library/employeeController.php?action=list')
            .then(res => res.json())
            .then(data => {
                listJs(data)
            })
    }

    function confirmDelete(idNum) {
        bodyModalDelete.innerHTML = `
            <p>You are about to delete an employee.</p>
            <p>Please, confirm this action.</p>
            <div class="btns-delete">
                <button class="btn btn-warning" onclick="deleteEmployee(${idNum})" data-bs-dismiss="modal" aria-label="Close">Confirm</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>`
    }
    function closeWarningDelete(){
        alertDelete.className = '';
        alertDelete.innerHTML = '';
    }

    function deleteEmployee(idNum) {
        fetch (`../src/library/employeeController.php?action=delete&id=${idNum}`)
            .then(res => res.json())
            .then(data => {
                alertDelete.className = '';
                alertDelete.innerHTML = '';
                listJs(data)   
            })
    }

    createForm.addEventListener("submit", e => {
        e.preventDefault();
        let formData = new FormData(createForm); 
        
        fetch('../src/library/employeeController.php?action=create', {
            method: 'POST',
            body: formData,
        })
            .then (res => res.json())
            .then (data => {
                listJs(data);
                closeModalBtn.click();
            })
        
    })

