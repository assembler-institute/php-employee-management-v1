const 
    tbody = document.getElementById('tbody');

    window.onload = () => dashboardPrint();

    function dashboardPrint(){
        fetch ('../src/library/employeeController.php')
            .then(res => res.json())
            .then(data => {
                while(tbody.hasChildNodes()) {
                    tbody.removeChild(tbody.firstChild);
                }
                for(let i = 0; i < data.length; i++ ) {
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
                        <td><a href="./employee.php?id=${data[i].id}">Update</a></td>
                        <td id="del" onclick="deleteEmployee(${data[i].id})">Delete</td>
                    `
                    tbody.appendChild(tr);
                }
            })
        }


        function deleteEmployee(idNum) {
            fetch ('../src/library/employeeController.php')
            .then(res => res.json())
            .then(data => {
                data.forEach(employee => {
                    if(employee.id === idNum) {
                        
                    }
                });
            })
        }