const 
    tbody = document.getElementById('tbody');

    window.onload = dashboardPrint();
    function dashboardPrint(){
        let info = {
            action: 'print',
        }
        fetch ('../../src/library/employeeController.php', {
            method: 'GET',
            body: info
        })
            .then(res => res.json())
            .then(data => {
                for(let i = 1; i <= data.length; i++ ) {
                   let tr = document.createElement('tr');
                   tr.innerHTML = ```
                        <td>${data['name']}</td>
                        <td>${data['email']}</td>
                        <td>${data['age']}</td>
                        <td>${data['streetAddress']}</td>
                        <td>${data['city']}</td>
                        <td>${data['state']}</td>
                        <td>${data['postalCode']}</td>
                        <td>${data['phoneNumber']}</td>
                        <td>delete icon</td>
                   ```
                   tbody.appendChild(tr);
                }
            })
    }