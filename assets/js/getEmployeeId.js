
document.addEventListener('dblclick', getId);

function getId(e){
    const clickedRow = e.target.parentElement;
    let userId = clickedRow.firstChild.textContent;
    window.location = `./employee.php?userId=${userId}`;
}
