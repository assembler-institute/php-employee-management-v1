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
            let alert = document.createElement('span');
            alert.innerHTML = data;
            alert.className = 'alert alert-danger';
            while(alertBox.hasChildNodes()){
                alertBox.removeChild(alertBox.firstChild);
            };
            alertBox.appendChild(alert);
        });
});


