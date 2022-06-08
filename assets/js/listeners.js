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




