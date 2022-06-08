import { createRow} from "./createRow.js";
import {createListeners, confirmDelete} from "./createListeners.js";

const tableBody = document.getElementById("tableBody");

refreshTable(0);
function refreshTable(empl){
//check if table has employees and create the table data
if(tableBody.children != 0){
    //charge the employees of data base
    fetch("../src/library/employeeController.php?empl="+empl)
    .then(async response => {
        try {
    
            const data = await response.json();
            if(data.length != 0){
                Array.from(tableBody.children).forEach(element => {
                    tableBody.removeChild(element);
                });
        

                let i = 1;
                data.forEach(element => {
                        //Create each row with Data Employeer with variable i for specify the id of each row
                        let row = createRow(element, element.id);
                        i++;
                        //We add the cell to tr and tr to tbody
                        tableBody.appendChild(row);
                });
            }
            createListeners();
            setNextPage();
            confirmDelete();
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

function setNextPage(){
let input = document.getElementById("nextPage");
let inputBack = document.getElementById("backPage");

let employeesShown = document.querySelectorAll(".tbody__emplpoyees--tr");
let lastEmployee = employeesShown[employeesShown.length-1].getAttribute("id");
let firstEmployee = employeesShown[0].getAttribute("id");

input.setAttribute("value", lastEmployee);
inputBack.setAttribute("value", firstEmployee);
}

let formNav = document.getElementById("form-navigation");
formNav.addEventListener("click",(event)=>{
    let input = document.getElementById("nextPage");
        refreshTable(input.getAttribute("value"));
})

let formNavBack = document.getElementById("form-navigation-back");
formNavBack.addEventListener("click",(event)=>{
    let inputBack = document.getElementById("backPage");
    if(inputBack.getAttribute("value")!=="1"){
        refreshTable("-"+inputBack.getAttribute("value"));
    }
})
