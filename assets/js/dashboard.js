const
    tbody = document.getElementById('tbody'),
    createForm = document.getElementById('createForm'),
    alertTimer = document.getElementById('alertTimer'),
    closeModalBtn = document.getElementById('closeModalBtn'),
    exitSession = document.getElementById('exitSession');

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
            <td>${data[i].name}</td>
            <td>${data[i].email}</td>
                <td class="extra-info">${data[i].age}</td>
                <td class="extra-info">${data[i].streetAddress}</td>
                <td class="extra-info">${data[i].city}</td>
                <td class="extra-info">${data[i].state}</td>
                <td class="extra-info">${data[i].postalCode}</td>
                <td class="extra-info">${data[i].phoneNumber}</td>
                <td><a class="update" href="./employee.php?id=${data[i].id}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                <td onclick="deleteEmployee(${data[i].id})"><i class="fa-solid fa-trash"></i></td>
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

    function deleteEmployee(idNum) {
        fetch (`../src/library/employeeController.php?action=delete&id=${idNum}`)
            .then(res => res.json())
            .then(data => {
                
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
                listJs(data)
            })
        
    })

