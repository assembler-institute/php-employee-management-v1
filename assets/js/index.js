import { createRow} from "./createRow.js";
import {createListeners} from "./createListeners.js";

const tableBody = document.getElementById("tableBody");
const mainContainer = document.getElementById("main_container");
const inputNextPage = document.getElementById("nextPage");
let dataLength;

refreshTable(0);
function refreshTable(empl){
    console.log(empl);
//check if table has employees and create the table data
if(tableBody.children != 0){
    console.log(tableBody.children);
    // Array.from(tableBody.children).forEach(element => {
    //     console.log("eliminando");
    //     tableBody.removeChild(element);
    // });
    console.log(tableBody);
    //charge the employees of data base
    fetch("../src/library/employeeController.php?empl="+empl)
    .then(async response => {
        try {
    
            const data = await response.json();
            if(data.length != 0){
                Array.from(tableBody.children).forEach(element => {
                    console.log("eliminando");
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
let input = document.getElementById("nextPage");
let inputBack = document.getElementById("backPage");
let employeesShown = document.querySelectorAll(".tbody__emplpoyees--tr");
console.log(employeesShown);
let lastEmployee = employeesShown[employeesShown.length-1].getAttribute("id");
let firstEmployee = employeesShown[0].getAttribute("id");
console.log(employeesShown[employeesShown.length-1]);
console.log(employeesShown[employeesShown.length-1].getAttribute("id"));
input.setAttribute("value", lastEmployee);
inputBack.setAttribute("value", firstEmployee);
console.log(input);
}

let formNav = document.getElementById("form-navigation");
formNav.addEventListener("click",(event)=>{
    let input = document.getElementById("nextPage");
    console.log("enviando "+input.getAttribute("value"));
    //async function leng(){ const li = await jsonLength(); console.log(li); };
    //let l = await jsonLength();
    //console.log(await leng());
    //if(input.getAttribute("value") !== leng().toString()){
       // console.log(await leng());
        refreshTable(input.getAttribute("value"));
    //}
})

let formNavBack = document.getElementById("form-navigation-back");
formNavBack.addEventListener("click",(event)=>{
    let inputBack = document.getElementById("backPage");
    console.log("enviando "+inputBack.getAttribute("value"));
    if(inputBack.getAttribute("value")!=="1"){
        refreshTable("-"+inputBack.getAttribute("value"));
    }
})


async function jsonLength(){
    fetch("../src/library/employeeController.php?leng=true")
    .then(async response => {
        try {
    
            const data = await response.json();
            let i = 1;
            // data.forEach(element => {
            //                 //Create each row with Data Employeer with variable i for specify the id of each row
            //                 let row = createRow(element, element.id);
            //                 i++;
            //                 //We add the cell to tr and tr to tbody
            //                 tableBody.appendChild(row);
            // });
            // createListeners();
            // test();
            console.log(data.length);
            return data.length;
        } catch (error) {
            console.log(error);
        }
    });
}
