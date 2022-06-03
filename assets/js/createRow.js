function createRow(element, i){
    //Create row, add class and id for the future listener
    let tableRow = document.createElement("tr");
    tableRow.classList.add("tbody__emplpoyees--tr");
    tableRow.setAttribute("id", i);
    let employeeForm = document.createElement("form");
    employeeForm.setAttribute("id", "employeeForm-" + i);
    employeeForm.setAttribute("action", "./library/employeeController.php");
    employeeForm.setAttribute("method", "post");
    let inputHidden = document.createElement("input");
    inputHidden.setAttribute("type", "hidden");
    inputHidden.setAttribute("name", "info");
    inputHidden.setAttribute("value", i);





    //we create the tablecells
    let tableCellName = document.createElement("td");
    let tableCellEmail = document.createElement("td");
    let tableCellAge = document.createElement("td");
    let tableCellStreet = document.createElement("td");
    let tableCellCity = document.createElement("td");
    let tableCellState = document.createElement("td");
    let tableCellPostal = document.createElement("td");
    let tableCellPhone = document.createElement("td");
    let tableCellIcon = document.createElement("td");
    let formButton = document.createElement("form");
    let btnDel = document.createElement("button");
    let icon = document.createElement("i");

    //Add class to each tableCell
    tableCellName.classList.add("tbody__employee--td");
    tableCellEmail.classList.add("tbody__employee--td");
    tableCellAge.classList.add("tbody__employee--td");
    tableCellStreet.classList.add("tbody__employee--td");
    tableCellCity.classList.add("tbody__employee--td");
    tableCellState.classList.add("tbody__employee--td");
    tableCellPostal.classList.add("tbody__employee--td");
    tableCellPhone.classList.add("tbody__employee--td");
    tableCellIcon.classList.add("tbody__employee--icon");
    icon.classList.add("bx");
    icon.classList.add("bxs-trash");
    formButton.setAttribute("action", "./library/employeeController.php");
    formButton.setAttribute("method", "post");
    btnDel.setAttribute("type", "submit");
    btnDel.setAttribute("name", "delete");
    btnDel.setAttribute("value", i);

    // get the employer name and add to the cell
    employeeLink.append(element.name);
    tableCellName.append(employeeLink);
    //tableCellName.append(element.name);
    employeeLink1.append(element.email);
    tableCellEmail.append(employeeLink1);
    //tableCellEmail.append(element.email);
    employeeLink2.append(element.age);
    tableCellAge.append(employeeLink2);
    //tableCellEmail.append(element.age);
    employeeLink3.append(element.streetAddress);
    tableCellStreet.append(employeeLink3);
    //tableCellStreet.append(element.streetAddress);
    employeeLink4.append(element.city);
    tableCellCity.append(employeeLink4);
    //tableCellCity.append(element.city);
    employeeLink5.append(element.state);
    tableCellState.append(employeeLink5);
    //tableCellState.append(element.state);
    employeeLink6.append(element.postalCode);
    tableCellPostal.append(employeeLink6);
    //tableCellPostal.append(element.postalCode);
    employeeLink7.append(element.phoneNumber);
    tableCellPhone.append(employeeLink7);
    //tableCellPhone.append(element.phoneNumber);
    tableCellIcon.append("-");
    tableCellIcon.setAttribute("id", "delete-"+i);
    btnDel.append(icon);
    formButton.appendChild(btnDel);
    tableCellIcon.appendChild(formButton);
    employeeForm.append(inputHidden);

    //Add the data of each cell to row
    tableRow.append(employeeForm, tableCellName, tableCellEmail,tableCellAge,tableCellStreet,tableCellCity,tableCellState,tableCellPostal,tableCellPhone, tableCellIcon);


    //return the row created with data employeer
    return tableRow;
}

export {createRow}


