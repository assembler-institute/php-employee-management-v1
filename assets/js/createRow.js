function createRow(element, i){
    //Create row, add class and id for the future listener
    let tableRow = document.createElement("tr");
    tableRow.classList.add("tbody__emplpoyees--tr");
    tableRow.setAttribute("id", i);

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
    tableCellStreet.append(element.streetAddress);
    tableCellCity.append(element.city);
    tableCellState.append(element.state);
    tableCellPostal.append(element.postalCode);
    tableCellPhone.append(element.phoneNumber);
    tableCellIcon.append("+");

    //Add the data of each cell to row
    tableRow.append(tableCellName,tableCellEmail,tableCellAge,tableCellStreet,tableCellCity,tableCellState,tableCellPostal,tableCellPhone,tableCellIcon);

    //return the row created with data employeer
    return tableRow;
}

export {createRow}