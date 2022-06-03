const addBtn = document.getElementById("add");
const addEmployee = document.getElementById('addEmployee');



// Add Employee form listener
addBtn.addEventListener("click", () =>{
    const rowInput = document.getElementById("rowInput");
    rowInput.classList.toggle("hide");
});


// 
addEmployee.addEventListener("click", (event) => {
    event.preventDefault();
});



window.onload = function()
{ 
    const tr = (document.getElementsByClassName("tbody__emplpoyees--tr"));
    Array.from(tr).map(element => {
        element.addEventListener("click", (event) => {
            let employeeId = event.target.parentElement.id;
            let form = document.getElementById("employeeForm-" + employeeId);
            form.submit();
            event.preventDefault();
    });
});
}




