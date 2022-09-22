const
    tbody = document.getElementById('tbody'),
    createForm = document.getElementById('createForm'),
    exitSession = document.getElementById('exitSession');

    dashboardPrint();

    function dashboardPrint(){
        fetch ('./library/employeeController.php?action=list')
            .then(res => res.json())
            .then(data => {
                while(tbody.hasChildNodes()) {
                    tbody.removeChild(tbody.firstChild);
                }
                for(let i = data.length - 1; i >= 0; i--) {
                    let tr = document.createElement('tr');
                    tr.innerHTML = `
                    <td>${data[i].name}</td>
                    <td>${data[i].email}</td>
                        <td>${data[i].age}</td>
                        <td>${data[i].streetAddress}</td>
                        <td>${data[i].city}</td>
                        <td>${data[i].state}</td>
                        <td>${data[i].postalCode}</td>
                        <td>${data[i].phoneNumber}</td>
                        <td><a class="update" href="./employee.php?id=${data[i].id}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                        <td onclick="deleteEmployee(${data[i].id})"><i class="fa-solid fa-trash"></i></td>
                    `
                    tbody.appendChild(tr);
                }
            })
    }

    function deleteEmployee(idNum) {
        fetch (`../src/library/employeeController.php?action=delete&id=${idNum}`)
            .then(res => res.json())
            .then(data => {
                data.forEach(employee => {
                    while(tbody.hasChildNodes()) {
                        tbody.removeChild(tbody.firstChild);
                    }
                    for(let i = data.length - 1; i >= 0; i--) {
                        let tr = document.createElement('tr');
                        tr.innerHTML = `
                        <td>${data[i].name}</td>
                        <td>${data[i].email}</td>
                            <td>${data[i].age}</td>
                            <td>${data[i].streetAddress}</td>
                            <td>${data[i].city}</td>
                            <td>${data[i].state}</td>
                            <td>${data[i].postalCode}</td>
                            <td>${data[i].phoneNumber}</td>
                            <td><a class="update" href="./employee.php?id=${data[i].id}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                            <td onclick="deleteEmployee(${data[i].id})"><i class="fa-solid fa-trash"></i></td>
                        `
                        tbody.appendChild(tr);
                    }
                });
            })
    }

    createForm.addEventListener("submit", e => {
        e.preventDefault();
        let formData = new FormData(createForm);
        let create = formData.get('create'); //null
        let num = formData.get('num');

        fetch('../src/library/employeeController.php?action=create', {
            method: 'POST',
            body: formData,
        })
            .then (res => res.json())
            .then (data => {
                while(tbody.hasChildNodes()) {
                    tbody.removeChild(tbody.firstChild);
                }
                for(let i = data.length - 1; i >= 0; i--) {
                    let tr = document.createElement('tr');
                    tr.innerHTML = `
                    <td>${data[i].name}</td>
                    <td>${data[i].email}</td>
                        <td>${data[i].age}</td>
                        <td>${data[i].streetAddress}</td>
                        <td>${data[i].city}</td>
                        <td>${data[i].state}</td>
                        <td>${data[i].postalCode}</td>
                        <td>${data[i].phoneNumber}</td>
                        <td><a class="update" href="./employee.php?id=${data[i].id}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                        <td class="del" onclick="deleteEmployee(${data[i].id})"><i class="fa-solid fa-trash"></i></td>
                    `
                    tbody.appendChild(tr);
                }
            })
    })
    exitSession.addEventListener('click',closeSession);


    function closeSession(){
        console.log('click');
        fetch('./library/sessionHelper.php?action=exit')
            .then(res => res.json())
            .then(data => {
                if(data === 'ok'){
                    location.reload();
                }
            })
    }