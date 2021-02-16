var selectedRow = null;

const employeeForm = document.getElementById("employeeInfo")
employeeForm.addEventListener("submit", onFormSubmit)



function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
    }
}

function readFormData() {
    var formData = {};
    formData["name"] = document.getElementById("name");
    formData["lastName"] = document.getElementById("last-name");
    formData["email"] = document.getElementById("email");
    formData["gender"] = document.getElementById("gender");
    formData["city"] = document.getElementById("city");
    formData["streetAddress"] = document.getElementById("street-number");
    formData["state"] = document.getElementById("state");
    formData["age"] = document.getElementById("age");
    formData["postalCode"] = document.getElementById("postal-code");
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("employeesTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.name;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.lastName;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.email;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.gender;
    cell5 = newRow.insertCell(4);
    cell5.innerHTML = data.city;
    cell6 = newRow.insertCell(5);
    cell6.innerHTML = data.streetAddress;
    cell7 = newRow.insertCell(6);
    cell7.innerHTML = data.state;
    cell8 = newRow.insertCell(7);
    cell8.innerHTML = data.age;
    cell9 = newRow.insertCell(8);
    cell9.innerHTML = data.postalCode;
    cell10 = newRow.insertCell(9);
    cell10.innerHTML = data.gender;
    cell11 = newRow.insertCell(10);
    cell11.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
}

function resetForm() {
    document.getElementById("name").value = "";
    document.getElementById("last-name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("gender").value = "";
    document.getElementById("city").value = "";
    document.getElementById("street-number").value = "";
    document.getElementById("state").value = "";
    document.getElementById("age").value = "";
    document.getElementById("postal-code").value = "";
    document.getElementById("phone-number").value = "";
    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("name").value = selectedRow.cells[0].innerHTML;
    document.getElementById("last-name").value = selectedRow.cells[1].innerHTML;
    document.getElementById("email").value = selectedRow.cells[2].innerHTML;
    document.getElementById("gender").value = selectedRow.cells[3].innerHTML;
    document.getElementById("city").value = selectedRow.cells[4].innerHTML;
    document.getElementById("street-number").value = selectedRow.cells[5].innerHTML;
    document.getElementById("state").value = selectedRow.cells[6].innerHTML;
    document.getElementById("age").value = selectedRow.cells[7].innerHTML;
    document.getElementById("postal-code").value = selectedRow.cells[8].innerHTML;
    document.getElementById("phone-number").value = selectedRow.cells[9].innerHTML;
    
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.name;
    selectedRow.cells[1].innerHTML = formData.lastName;
    selectedRow.cells[2].innerHTML = formData.email;
    selectedRow.cells[3].innerHTML = formData.gender;
    selectedRow.cells[4].innerHTML = formData.city;
    selectedRow.cells[5].innerHTML = formData.streetAddress;
    selectedRow.cells[6].innerHTML = formData.state;
    selectedRow.cells[7].innerHTML = formData.age;
    selectedRow.cells[8].innerHTML = formData.postalCode;
    selectedRow.cells[9].innerHTML = formData.phoneNumber;

}

function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("employeesTable").deleteRow(row.rowIndex);
        resetForm();
    }
}
function validate() {
    isValid = true;
    if (document.getElementById("name").value == "") {
        isValid = false;
        document.getElementById("fullNameValidationError").classList.remove("hide");
    } else {
        isValid = true;
        if (!document.getElementById("fullNameValidationError").classList.contains("hide"))
            document.getElementById("fullNameValidationError").classList.add("hide");
    }
    return isValid;
}