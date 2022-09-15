const 
    form            = document.getElementById('loginForm'),
    alertBox        = document.getElementById('alert-box');

let data = new FormData(form);
let username = data.get('username');
let pass = data.get('pass');

fetch('src/library/loginController.php', {
    method: 'POST',
    body: username
})
    .then(res => res.json())
    .then(data => {
        let info = document.createElement('div');
        info.className = "//clase de Boostrap";
        info.innerHTML = data;
        alertBox.appendChild(info);
    })