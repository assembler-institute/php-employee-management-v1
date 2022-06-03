export function createListeners(){
    const tr = (document.getElementsByClassName("tbody__emplpoyees--tr"));
    Array.from(tr).map(row=>{
        Array.from(row.children).map(cell => {
            if(!cell.classList.contains("tbody__employee--icon")){
            cell.addEventListener("click", (event) => {
                let employeeId = event.target.parentElement.id;
                let form = document.getElementById("employeeForm-" + employeeId);
                form.submit();
        });
    }
    })
});
}