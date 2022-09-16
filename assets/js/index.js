const 
    form = document.getElementById('login'),
    alertBox = document.getElementById('alertBox');

form.addEventListener('submit', e => {
    e.preventDefault(); 
    let loginData = new FormData(form);
    fetch('src/library/loginController.php',{
        method:'POST',  
        body: loginData,        
    })
        .then(res => res.json())
        .then(data => { 
            if (data === 'You need to fill in all the information') {
                let alert = document.createElement('span');
                alert.innerHTML = data;
                alert.className = 'alert alert-danger';
                while(alertBox.hasChildNodes()){
                    alertBox.removeChild(alertBox.firstChild);
                };
                alertBox.appendChild(alert);
            } else if (data === 'OK') {
                window.location.replace("http://localhost/assembler_projects/php_module/php-employee-management-v1/src/dashboard.php");
            } else if (data === 'Error: Not matching data found') {
                let noMatch = document.createElement('span');
                noMatch.innerHTML = data;
                noMatch.className = 'alert alert-danger';
                while(alertBox.hasChildNodes()){
                    alertBox.removeChild(alertBox.firstChild);
                };
                alertBox.appendChild(noMatch);
            }
        });
});


