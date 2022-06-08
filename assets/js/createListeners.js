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


export function confirmDelete() {
    //Get all the delete buttons
    const btnDel = document.querySelectorAll('[name="delete"]');
    //Add event listener to each button to confirm deletion
    Array.from(btnDel).map(btn => {
        btn.addEventListener("click", (event) => {
            if (confirm("Are you sure you want to delete this employee?")) {
                let employeeId = event.target.parentElement.parentElement.id;
                let form = document.getElementById("employeeForm-" + employeeId);
                form.submit();
            } else {
                event.preventDefault();
            }
        });
    });
}