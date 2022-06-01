//import { createRow, tableCellName, tableCellEmail, tableCellAge, tableCellStreet, tableCellCity, tableCellState, tableCellPostal, tableCellPhone, tableCellIcon } from "./createRow.js";

const tableBody = document.getElementById("tableBody");

//check if table has employees
if(tableBody.children != 0){
    Array.from(tableBody).forEach(element => {
        tableBody.removeChild(element);
    });

    //charge the employees of data base
    fetch("../resources/employees.json")
    .then(response => response.json())
    .then(data =>{
        data.forEach(element => {
            const tableRow = document.createElement("tr");
            tableRow.classList.add("tbody__emplpoyees--tr");
            //createRow(element);
            //we create the tablecells
            const tableCellName = document.createElement("td");
            const tableCellEmail = document.createElement("td");
            const tableCellAge = document.createElement("td");
            const tableCellStreet = document.createElement("td");
            const tableCellCity = document.createElement("td");
            const tableCellState = document.createElement("td");
            const tableCellPostal = document.createElement("td");
            const tableCellPhone = document.createElement("td");
            const tableCellIcon = document.createElement("td");

            //Add class to each tableCell
            tableCellName.classList.add("tbody__employee--td");
            tableCellEmail.classList.add("tbody__employee--td");
            tableCellAge.classList.add("tbody__employee--td");
            tableCellStreet.classList.add("tbody__employee--td");
            tableCellCity.classList.add("tbody__employee--td");
            tableCellState.classList.add("tbody__employee--td");
            tableCellPostal.classList.add("tbody__employee--td");
            tableCellPhone.classList.add("tbody__employee--td");
            tableCellIcon.classList.add("tbody__employee--td");

            // get the employer name and add to the cell
            tableCellName.append(element.name);
            tableCellEmail.append(element.email);
            tableCellAge.append(element.age);
            tableCellStreet.append(element.street);
            tableCellCity.append(element.city);
            tableCellState.append(element.state);
            tableCellPostal.append(element.postalCode);
            tableCellPhone.append(element.phoneNumber);
            tableCellIcon.append("+");


            //We add the cell to tr and tr to tbody
            tableRow.append(tableCellName,tableCellEmail,tableCellAge,tableCellStreet,tableCellCity,tableCellState,tableCellPostal,tableCellPhone,tableCellIcon);
            tableBody.appendChild(tableRow);
        });
    })
    .catch((error)=>console.warn(error));
}else{
    console.log(("no hay hijos"));
    fetch("../resources/employees.json")
    .then(response => response.json())
    .then(data =>{
        let child = document.createElement("p");
        child.textContent = data;
        tableBody.appendChild(child);
    })
    .catch((error)=>console.warn(error));
}

