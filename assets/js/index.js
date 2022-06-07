import { createRow} from "./createRow.js";
import {createListeners} from "./createListeners.js";

const tableBody = document.getElementById("tableBody");
const mainContainer = document.getElementById("main_container");
let formNav = document.getElementById("form-navigation");
console.log(formNav);
const inputNextPage = document.getElementById("nextPage");

refreshTable(0);
function refreshTable(empl){
//check if table has employees and create the table data
if(tableBody.children != 0){
    Array.from(tableBody).forEach(element => {
        tableBody.removeChild(element);
    });
    //charge the employees of data base
    fetch("../src/library/employeeController.php?empl="+empl)
    .then(async response => {
        try {
            
            console.log("hola");
            const data = await response.json();
            let i = 1;
            data.forEach(element => {
                            //Create each row with Data Employeer with variable i for specify the id of each row
                            let row = createRow(element, i);
                            i++;
                            //We add the cell to tr and tr to tbody
                            tableBody.appendChild(row);
            });
            // let employeesShown = document.querySelectorAll(".tbody__emplpoyees--tr");
            // let lastEmployee = employeesShown[employeesShown.length-1].getAttribute("id");
            //console.log(lastEmployee);
            //inputNextPage.setAttribute("value", lastEmployee);
            createListeners();
            test();
        } catch (error) {
            console.log(error);
        }
    });
}else{
    fetch("../src/library/employeeController.php")
    .then(response => response.json())
    .then(data =>{
        
        let i = 1;
        data.forEach(element => {
            //Create each row with Data Employeer with variable i for specify the id of each row
            let row = createRow(element, i);
            i++;

            //We add the cell to tr and tr to tbody
            tableBody.appendChild(row);
        });
    })
    .catch((error)=>console.warn(error));
}
}

function test(){
if(formNav == null){
    let formNav = document.createElement("form");
    const input = document.createElement("input");
    let employeesShown = document.querySelectorAll(".tbody__emplpoyees--tr");
    console.log(employeesShown);
    let lastEmployee = employeesShown[employeesShown.length-1].getAttribute("id");

    formNav.setAttribute("id", "form-navigation");
    formNav.setAttribute("action", "./library/employeeController.php");
    formNav.setAttribute("method", "post");

    input.setAttribute("type", "hidden");
    input.setAttribute("name", "page");
    input.setAttribute("value", lastEmployee);

    formNav.append(input, "Next");
    mainContainer.append(formNav);

    formNav.addEventListener("click",(event)=>{
        //formNav.submit();
        refreshTable(lastEmployee);
    })
}
}



