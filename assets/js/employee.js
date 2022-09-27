const
    alertTimer = document.getElementById('alertTimer'),
    exitSession = document.getElementById('exitSession');

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
