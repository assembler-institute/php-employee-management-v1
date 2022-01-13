window.onload = function () {
    if ($('#userId').val() != " ") { //If the hidden id input contains any values, if not pass, go to "create employe mode" (else)
        var userId = $('#userId').val(); //get this value
        chargeData(userId); //sends it as a parameter to the function
        saveListenerUpdate(); //activate listener to submit (update)
    } else {
        $('#nameTitle').text('New Employee'); //fill the title(h2) in employee.php
        saveListenerCreate(); //activate listener to submit (create)
    }
    //listener to go back with cancel btn
    $("#cancelBtn").on("click", function (e) {
        e.preventDefault();
        window.location = "dashboard.php";
    })
}

async function chargeData(userId) {
    //the object is retrieved based on the url with that Id
    //get employee selected
    await fetch("../src/library/employeeController.php?userId=" + userId, {
            method: 'GET'
        })
        .then((response) => response.json())
        .then((data) => {
            //fill inputs with data obj
            writeInput(data);
        });
}

function writeInput(obj) {
    //values are printed dynamically in the form
    $('#nameTitle').text(obj.name + " " + obj.lastName); //fill in the h2 of employee.php
    $('#inputName').val(obj.name);
    $('#inputEmail').val(obj.email);
    $('#inputCity').val(obj.city);
    $('#inputState').val(obj.state);
    $('#inputPostalCode').val(obj.postalCode);
    $('#inputLastName').val(obj.lastName);
    $('#inputGender').val(obj.gender);
    $('#inputStreetAddress').val(obj.streetAddress);
    $('#inputPhoneNumber').val(obj.phoneNumber);
    $('#inputAge').val(obj.age);
}

function saveListenerUpdate() {

    $('#employeeForm').on('submit', function (e) {
        e.preventDefault(); //to avoid sending data by url in the browser
        var obj = getFormValues();
        fetchUpdate(obj);
    })

}

function saveListenerCreate() {

    $('#employeeForm').on('submit', function (e) {
        e.preventDefault(); //to avoid sending data by url in the browser
        var obj = getFormValues();
        fetchCreate(obj);
    })

}

function getFormValues() {
    var elements = document.getElementById("employeeForm").elements; //we collect the elements of the form
    var obj = {};
    for (var i = 0; i < elements.length; i++) { //each element is scrolled through leaving the buttons out
        var item = elements.item(i);
        if (item.id == "saveBtn" || item.id == "cancelBtn") {
            break
        }
        obj[item.name] = item.value; //All values are collected within an object
    }
    return obj;
}

async function fetchUpdate(obj) {
    await fetch("./library/employeeController.php?update=" + obj.id, { //we call the update() function via the object's id
            method: "PUT",
            body: JSON.stringify(obj)
        })
        .then(response => {
            //if response is ok, print a success msg, else, print error msg
            if (response.ok) {
                $(".msgContainer").append(`
                <div class="alert alert-success insertMsg"  role="alert">
                    Your employee was updated!
                </div>
                <div class="alert alert-warning" role="alert">
                        Returning to dashboard...
                </div>
                `)
                setTimeout(function () {
                    window.location = 'dashboard.php';
                }, 4000)
            } else {
                $(".msgContainer").append(`
                <div class="alert alert-danger insertMsg"  role="alert">
                    An error has ocurred, try again!
                </div>
                `)
            }
        })

}

async function fetchCreate(obj) {
    await fetch("./library/employeeController.php?newEmployee=true", { //we call the function newEmployee()
            method: "POST",
            body: JSON.stringify(obj)
        })
        .then(response => {
            if (response.ok) {
                //if response is ok, print a success msg, else, print error msg
                $(".msgContainer").append(`
                    <div class="alert alert-success insertMsg"  role="alert">
                        Your employee was created!
                    </div>
                    <div class="alert alert-warning" role="alert">
                        Returning to dashboard...
                    </div>
                    `)
                setTimeout(function () {
                    window.location = 'dashboard.php';
                }, 4000)
            } else {
                $(".msgContainer").append(`
                <div class="alert alert-danger insertMsg"  role="alert">
                    An error has ocurred, try again!
                </div>
                `)
            }
        })
}