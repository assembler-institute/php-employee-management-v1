import { createRow} from "./createRow.js";
import {createListeners} from "./createListeners.js";

const tableBody = document.getElementById("tableBody");

//check if table has employees and create the table data
if(tableBody.children != 0){
    Array.from(tableBody).forEach(element => {
        tableBody.removeChild(element);
    });
    //charge the employees of data base
    fetch("../src/library/employeeController.php")
    .then(async response => {
        try {
            const data = await response.json();
            let i = 1;
            data.forEach(element => {
                            //Create each row with Data Employeer with variable i for specify the id of each row
                            let row = createRow(element, i);
                            i++;
                
                            //We add the cell to tr and tr to tbody
                            tableBody.appendChild(row);
            });
            createListeners();
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





