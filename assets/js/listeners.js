const addBtn = document.getElementById("add");
const addEmployee = document.getElementById('addEmployee');

addBtn.addEventListener("click", () =>{
    const rowInput = document.getElementById("rowInput");
    rowInput.classList.toggle("hide");
});

addEmployee.addEventListener("click", (event) => {

    event.preventDefault();

});

// export function setListenersDelete(btnDelete){
//     btnDelete.addEventListener("click", ()=>{
//         const ident = btnDelete.getAttribute("id");
//         fetch("../../src/library/employeeController.php?action=delete-"+ident)
//         .then(async response => {
//             try {
//                 const data = await response.json();
//                 let i = 1;
//                 data.forEach(element => {
//                                 //Create each row with Data Employeer with variable i for specify the id of each row
//                                 let row = createRow(element, i);
//                                 i++;
                    
//                                 //We add the cell to tr and tr to tbody
//                                 tableBody.appendChild(row);
//                 });
//             } catch (error) {
//                 console.log(error);
//             }
//         });
//     })
// }


