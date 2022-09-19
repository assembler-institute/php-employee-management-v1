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
            if (data === 'Blank') {
                let alert = document.createElement('span');
                alert.innerHTML = 'You need to fill in all the information';
                alert.className = 'alert alert-danger';
                while(alertBox.hasChildNodes()){
                    alertBox.removeChild(alertBox.firstChild);
                };
                alertBox.appendChild(alert);
            } else if (data === 'OK') {
                window.location.replace("src/dashboard.php");
            } else if (data === 'No match') {
                let noMatch = document.createElement('span');
                noMatch.innerHTML = 'Error: No matching data found';
                noMatch.className = 'alert alert-danger';
                while(alertBox.hasChildNodes()){
                    alertBox.removeChild(alertBox.firstChild);
                };
                alertBox.appendChild(noMatch);
            }
        });
});


